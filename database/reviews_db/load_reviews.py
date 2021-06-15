import sqlite3, os

if __name__ == "__main__":
    conn = sqlite3.connect('reviews.db')
    cursor = conn.cursor()

    cursor.execute("SELECT text FROM reviews;")
    
    reviews_text = ''
    for review in cursor.fetchall():
        reviews_text += f' "{review}"'
    
    print(os.system('python sentiment_analysis.py'+reviews_text))