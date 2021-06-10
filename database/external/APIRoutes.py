BASE_INE_URL             = 'https://ine.es'
_INE_MUNICIPALITIES_POP  = '/dynt3/inebase/es/index.htm?padre=517&capsel=525'
regex_ine_municipalities          = '(\/jaxiT3\/.*?)"[\s\S]*?lo">(.*?):'
regex_ine_municipalities_get_json = 'href="(https:\/\/ser.*?)"'

HTTP_HEADERS = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0'
}

# Ine main:_  "https://www.ine.es/dynt3/inebase/es/index.htm?padre=517"