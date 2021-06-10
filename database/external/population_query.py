from multiprocessing import Pool
import json, requests, re

import os, sys
sys.path.append(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))
# import ../APIRoutes
import APIRoutes


def get_municipalities_pop_json_urls():
    raw_html = requests.get(APIRoutes.BASE_INE_URL + APIRoutes._INE_MUNICIPALITIES_POP, headers=APIRoutes.HTTP_HEADERS).text

    municipalities_index_regex = re.compile(APIRoutes.regex_ine_municipalities, re.UNICODE)

    municipalities = municipalities_index_regex.findall(raw_html)
    return municipalities
        

def get_json_url(municipality):
    resources_table_regex = re.compile(APIRoutes.regex_ine_municipalities_get_json, re.UNICODE)
    raw_html = requests.get(APIRoutes.BASE_INE_URL + municipality[0], headers=APIRoutes.HTTP_HEADERS).text

    return (municipality[1], resources_table_regex.findall(raw_html)[0])


def extract_pop_from_url(json_url):
    json_string = requests.get(json_url[1], headers=APIRoutes.HTTP_HEADERS).text    # If link is down, we facked.
    municipalities_json = json.loads(json_string)

    res = []
    for i in range(0, len(municipalities_json)//3):
        res.append(json.dumps(('City:', json_url[0], '. Municipality:', municipalities_json[i*3]["Nombre"].partition('.')[0], '. Total_Pop:', municipalities_json[i*3]['Data'][0]["Valor"])))
    
    return res

if __name__ == "__main__":
    # print(*map(APIRoutes.get_json_url, APIRoutes.get_municipalities_pop_json_urls())) -- Takes too long
     
    with Pool() as p:
        json_urls = p.map(get_json_url, get_municipalities_pop_json_urls())

    p.join()
    p.close()

    municipality_json_string = '{\n'
    for json_url in json_urls:
        json_string = requests.get(json_url[1], headers=APIRoutes.HTTP_HEADERS).text    # If link is down, we facked.

        municipalities_json = json.loads(json_string)

        municipality_json_string += f'\t"{json_url[0]}" : {{\n'
        for i in range(1, len(municipalities_json)//3):
            municipality_name = municipalities_json[i*3]["Nombre"].partition(".")[0]
            if json_url[0] == 'Huelva' and i == 79:   # Get rid of syntax mistake from Huelva INE JSON item 237
                municipality_name = municipality_name[:-5]
            
            municipality_json_string += f'\t\t"{municipality_name}" : {municipalities_json[i*3]["Data"][0]["Valor"]},\n'

        municipality_json_string = municipality_json_string[:-2] + '\n\t},\n'
    
    with open('muni_pop.json', 'w', encoding='utf-8') as outfile:
        outfile.write(municipality_json_string[:-2] + '\n}')
