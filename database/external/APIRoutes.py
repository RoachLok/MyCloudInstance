BASE_INE_URL             = 'https://ine.es'
_INE_MUNICIPALITIES_POP  = '/dynt3/inebase/es/index.htm?padre=517&capsel=525'
regex_ine_municipalities          = '(\/jaxiT3\/.*?)"[\s\S]*?lo">(.*?):'
regex_ine_municipalities_get_json = 'href="(https:\/\/ser.*?)"'

HTTP_HEADERS = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0'
}

# Ine main:_  "https://www.ine.es/dynt3/inebase/es/index.htm?padre=517"

#Youtube API
BASE_YT_URL = "https://www.googleapis.com/youtube/v3/videos?"
part = "part=snippet,statistics&"
videos_id = "id=hx4NNTYb85c%2CtJJbTuviob4%2CbjFvcFjJpE0%2COg847HVwRSI%2CpoJfwre2PIs%2CmxKNH2gmdUc%2CD7YMSt2ntWY%2Crd6SgAIvGjw%2CaYjGXzktatA%2CEGQh5SZctaE%2CmUxS-35qO44%2C_zusEe3GOe8%2CAzLqTgC0E0s%2CtCAt8eEKPDc%2CY_9t3eQFmU4%2CwvDFdfJtSJw%2Cifo76VyrBYo%2CPb3AAfz5Yjg%2CODnP1P0JiRw%2ChvpWue4d8bY&"
fields = "fields=items(snippet(title,tags,publishedAt),statistics)&"
yt_key = "key=AIzaSyB57JWxOeS11LIWhkPopj4k1jGYSzPTV6g"


#Stack Exchange API
BASE_STACK_URL = "https://api.stackexchange.com/2.2/questions?"
order = "order=desc&"
site = "site=stackoverflow&"
sort = "sort=month&"
stack_key = "key=b07lxk1rp3R*1WO7sAgzPA(("