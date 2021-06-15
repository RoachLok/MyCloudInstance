# Based on co-authored code made along with Diego Vicente and Gonzalo Alcaide

import pandas as pd
import numpy as np
import re, string, sys
from sklearn.feature_extraction.text import TfidfVectorizer
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
from sklearn.linear_model import LogisticRegression
from nltk.corpus import stopwords # Import the stopwords downloaded
from nltk.stem import SnowballStemmer


# Load dataset
df = pd.read_csv('training_set.csv', encoding='latin-1')
df.columns = ['sentiment', 'content']

def count_words(content):
    count = 0
    for letter in content:
        if letter == ' ':
            count += 1
    if count < 3:
        return ''
    return content

df.content = df['content'].apply(count_words)

# Tweet processing
snow = SnowballStemmer('english')
stop_words = set(stopwords.words('english'))
stop_words.remove('not')

emojis = {':)': 'smile', ':-)': 'smile',':D':'smile',';D':'wink', ';d': 'wink','xd':'funny','xD':'funny','XD':'funny',
          ':-E': 'vampire', ':(': 'sad', ':-(': 'sad', ':-<': 'sad', ':P': 'raspberry', ':O': 'surprised',
          ':-@': 'shocked', ':@': 'shocked',':-$': 'confused', ':\\': 'annoyed','UwU':'love','uwu':'love', 
          ':#': 'mute', ':X': 'mute', ':^)': 'smile', ':-&': 'confused', '$_$': 'greedy',' :*(':'sad',
          '@@': 'eyeroll', ':-!': 'confused', ':-D': 'smile', ':-0': 'yell', 'O.o': 'confused', '?':'qmark',
          '<(-_-)>': 'robot', 'd[-_-]b': 'dj', ":'-)": 'sadsmile', ';)': 'wink','<3':'love',
          ';-)': 'wink', 'O:-)': 'angel','O*-)': 'angel','(:-D': 'gossip', '=^.^=': 'cat', 'nope':'not'}

def process_tweet(content):
    content.lower()
    content = re.sub(r'http\S+|www\S+|https\S+', '', content, flags=re.MULTILINE)
    content = re.sub(r'\@\w+|\#','', content)
    # Flood words correcting
    content = re.sub(r'(.)\1{2,}', r'\1', content)
    # Replace emojis to make dataset fit for reviews analysis.
    for emoji in emojis.keys():
            content = content.replace(emoji, emojis[emoji])
    # Punctuation removal
    content = content.translate(str.maketrans('', '', string.punctuation))
    # Stopwords removal
    content_tokens = word_tokenize(content)
    filtered_words = [w for w in content_tokens if not w in stop_words]

    # Apply stemming for better training.
    filtered_words = [snow.stem(w) for w in content_tokens]

    return " ".join(filtered_words)

df.content = df['content'].apply(process_tweet)

# Dataset Corpus
# df[df['sentiment']==0]['content']

# Aplicamos la transformacion de vector de terminos en forma TF-IDF
tfidf_vector = TfidfVectorizer(sublinear_tf=True)
tfidf_vector.fit(np.array(df.iloc[:, 1]).ravel())

X = tfidf_vector.transform(np.array(df.iloc[:, 1]).ravel())
y = np.array(df.iloc[:, 0]).ravel()

# Used for model choosing
# X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=30)

""" Evaluate and test for better performing algorithm
# Compare models using crossed validation scores.
models = []

models.append(('LR' , LogisticRegression(n_jobs = -1, solver='lbfgs')))
models.append(('KNN', KNeighborsClassifier(n_jobs = -1)))
models.append(('MNB', MultinomialNB()))
models.append(('DT' , DecisionTreeClassifier()))
models.append(('SGD', SGDClassifier()))
models.append(('SVC' , LinearSVC()))
results = []
names = []
for name, model in models:
    cv_results = cross_val_score(model, X_train, y_train, cv = 10, scoring = "accuracy")
    results.append(cv_results)
    names.append(name)
    msg = f"{name}: {cv_results.mean()} ({cv_results.std()})"
    print(msg)

# PRint boxplot for model performance comparisson.
fig = plt.figure()
fig.suptitle('Algorithm Comparison')
ax = fig.add_subplot(111)
plt.boxplot(results)
ax.set_xticklabels(names)
plt.show() """

# Fittest model from previous test
classifier = LogisticRegression(n_jobs = -1)
classifier.fit(X, y)

prediction = '{"predictions" : {'
for text in sys.argv[1:]:
    text = process_tweet(text)
    processed = tfidf_vector.transform(np.array([str(text)]).ravel())
    prediction += f'"{text}":"{classifier.predict(processed)[0]}",'

prediction = prediction[:-1] + '} }'

print(prediction)
