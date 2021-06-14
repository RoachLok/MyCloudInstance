import sys
import json
import requests

# python geolocate.py user_id n_rows (log_ip log_time) ... n(log_ip log_time)

user_id = str(sys.argv[1])
print(f'{{ "{user_id}" : [')
i = 3
while i < int(sys.argv[2])*2+4:
    log_ip   = str(sys.argv[i])
    log_time = str(sys.argv[i+1])

    url = 'http://ip-api.com/json/'

    r = requests.get(url+log_ip)
    r_json = json.loads(r.text)

    lat = r_json['lat']
    lon = r_json['lon']

    #print('{ "Lat":',lat,', "Lon":',lon,'}')

    gocode_token = '19d409aac95d62312d584d88b1d9774f'   # For testing
    geocode_url = 'http://api.positionstack.com/v1/reverse?access_key=' + gocode_token + '&query=' + str(lat) + ',' + str(lon)
    print(geocode_url)
    r_geocode = requests.get(geocode_url)
    geocode_json = json.loads(r_geocode.text)

    #print('{\n"Continent" :"', geocode_json['data'][0]['continent']+'",')
    #print('"Country" :"', geocode_json['data'][0]['country']+'",')
    #print('"Autonomous_Community" :"', r_json['regionName']+'",')
    #print('"Municipality" :"', geocode_json['data'][0]['administrative_area']+'"\n}')

    print(f"""{{
            "time":"{log_time}",
            "ip":"{log_ip}",
            "coords": [{{
                "lat":{lat},
                "long":{lon}}}],
            "geo": [{{
                "Continent":"{geocode_json['data'][0]['continent']}",
                "Country":"{geocode_json['data'][0]['country']}",
                "Autonomous Community":"{r_json['regionName']}",
                "City":"{geocode_json['data'][0]['region']}",
                "Municipality":"{geocode_json['data'][0]['administrative_area']}"}}]}}""")
    
    if i < int(sys.argv[2])*2+3:
        print(',')
    
    i+=2

print("]}")

