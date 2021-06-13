from google.auth.transport.requests import Request
import requests
import urllib.parse as p
import json
import nltk
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
import re
import time
import json
en_stops = stopwords.words('english')

SCOPES = ["https://www.googleapis.com/auth/youtube.force-ssl"]

#Dictionary with the tags
diction = {
    "python" : "py",
    "py"    : "py",
    "r"     : "r",
    "go"    : "go",
    "c++"   : "c++",
    "c#"    :  "c#",
    "c"     :   "c",  
    "javascript"  : "javascript",  
    "html"  :   "html",  
    "java"  :   "java",  
    "sql"   :   "sql",  
    "sql-server"    :   "sql-server",  
    "jquery"    :   "jquery",  
    "postresql" :   "postresql",  
    "css"   :   "css",  
    "font_awesome"  :   "font awesome",  
    "reactsjs"  :   "react",  
    "flutter"   :   "flutter",  
    "node.js"   :   "node",  
    "ajax"  :   "ajax",  
    "swift" :   "swift",  
    "swiftui"   :   "swift",  
    "angular"   :   "angular",  
    "android"   :   "android",  
    "android-studio"    :   "android",  
    "kotlin"    :   "kotlin",  
    "gradle"    :   "gradle",  
    "npm"   :   "node",  
    "web"   :   "web",  
    "ios"   :   "ios",  
    "xcode" :   "ios",  
    "react-native"  :   "react",   
    "unity3d"   :   "unity",  
    "php"   :  "php",  
    "objective c"   :   "objective c",  
    "cobol" :   "cobol",  
    "ruby"  :   "ruby",  
    "pearl" :   "pearl",  
    "Go"    :   "go",  
    "Python"    :   "py",  
    "Java"  :   "java",  
    "Javascript"    :   "javascript",  
    "C++"   :   "c++",  
    "Ruby"  :   "ruby",  
    "C" :   "c",  
    "HTML"  :   "html",  
    "CSS"   :   "css",  
    "C#"    :   "c#",  
    "SQL"   :   "sql",  
    "PHP"   :   "php",  
    "Android"   :   "android",  
    "IOS"   :   "ios",  
    "Swift" :   "swift",  
    "Node.js"   :   "node",  
    "Angular"   :   "angular",  
    "Reactjs"   :   "react",  
    "Flutter"   :   "flutter",  
    "R" :     "r",
    "laravel": "php",
    "docker": "docker",
    "assembler": "assembler",
    "iOS" : "ios",
    "c programming" : "c",
    "c++ programming" : "c++",
    "Vue"   : "vue",
    "App" : "app",
    "Laravel" : "laravel",
    "programming for beginners" :   "beginners",
    "coding"    :   "coding",
    "software development" : "software developer",
    "computer science programming language" :   "computer science",
    "Dart" :    "dart",
    "Gradle" : "gradle",
    "Maven" : "maven",
    "array" : "array",
    "matrix" : "matrix",
    "Jetpack" : "jetpack",
    "Nuxt.js" : "nuxtjs"
    
}

#Youtube Api GET Call
part = "part=snippet,statistics&"
videos_id = "id=hx4NNTYb85c%2CtJJbTuviob4%2CbjFvcFjJpE0%2COg847HVwRSI%2CpoJfwre2PIs%2CmxKNH2gmdUc%2CD7YMSt2ntWY%2Crd6SgAIvGjw%2CaYjGXzktatA%2CEGQh5SZctaE%2CmUxS-35qO44%2C_zusEe3GOe8%2CAzLqTgC0E0s%2CtCAt8eEKPDc%2CY_9t3eQFmU4%2CwvDFdfJtSJw%2Cifo76VyrBYo%2CPb3AAfz5Yjg%2CODnP1P0JiRw%2ChvpWue4d8bY&"
fields = "fields=items(snippet(title,tags,publishedAt),statistics)&"
key = "key=AIzaSyB57JWxOeS11LIWhkPopj4k1jGYSzPTV6g"
yt_response = requests.get("https://www.googleapis.com/youtube/v3/videos?" + part + videos_id + fields + key)

#Stack Exchange Api GET call
stack_response = requests.get("https://api.stackexchange.com/2.2/questions?order=desc&site=stackoverflow&sort=month&key=b07lxk1rp3R*1WO7sAgzPA((")

#Load the json result of the Api calls
decoded_yt_results = json.loads(yt_response.text)
decoded_stack_results = json.loads(stack_response.text)
categorized_tags = []

#Get Youtube API lists
def decode_yt():
    #List declaration
    title, date, likes, dislikes, upvotes, views = ([] for i in range(6))
    #Traverse the json item by item
    for result in decoded_yt_results["items"]:
        #Tokenize by word
        title_aux = nltk.word_tokenize(result["snippet"]["title"])
        #Traverse title and filter possible categories
        for word in title_aux:
            #Regex to clean useless characters
            cleaned_title = re.sub('[^A-Za-z0-9]+', '', word)
            if (word not in en_stops) and (cleaned_title != ''):
                title.append(word)
                if word in diction:
                    categorized_tags.append(diction[word])
        #Append elements to lists
        date.append(result["snippet"]["publishedAt"])
        likes.append(result["statistics"]["likeCount"])
        dislikes.append(result["statistics"]["dislikeCount"])
        views.append(result["statistics"]["viewCount"])
        #Filter possible tags by the dicionary
        if "tags" in result["snippet"]:
            for tag in result["snippet"]["tags"]:
                if tag in diction:
                    categorized_tags.append(diction[tag])

    upvotes =[like - dislike for (like, dislike) in zip([int(i) for i in likes],[int(i) for i in dislikes])]
    views = [int(i) for i in views]

    return date, upvotes, views
    
#Get Stack Exchange API lists    
def decode_stack():
    #List declaration
    title_stack, score, view_stack, date_stack  = ([] for i in range(4))
    #Traverse the json item by item
    for res in decoded_stack_results["items"]:
        #Tokenize by word
        title_aux_stack = nltk.word_tokenize(res["title"])
        #Traverse title and filter possible categories
        for word in title_aux_stack:
            #Regex to clean useless characters
            clean = re.sub('[^A-Za-z0-9]+', '', word)
            if (word not in en_stops) and (clean != ''):
                title_stack.append(word)
                if word in diction:
                    categorized_tags.append(diction[word])
        #Append elements to lists
        score.append(res["score"])
        view_stack.append(res["view_count"])
        date_stack.append(time.strftime('%Y-%m-%d %H:%M:%S', time.localtime(res["creation_date"])))
        #Filter possible tags by the dicionary
        for tag in res["tags"]:
            if tag in diction:
                categorized_tags.append(diction[tag])

    return date_stack,score,view_stack

#Get filtered tags
def get_tags():
    return set(categorized_tags)

"""
if __name__ == "__main__":
    decode_yt()
    decode_stack()
    get_tags()"""





