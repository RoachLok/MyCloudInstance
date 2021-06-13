import sqlite3
from nltk.tokenize import api
import yt_stack_query

#Lists from Youtube API
dates_yt = list(yt_stack_query.decode_yt()[0])
upvotes_yt = yt_stack_query.decode_yt()[1]
views_yt = yt_stack_query.decode_yt()[2]

#Lists from Stack Exchange API
dates_stack = list(yt_stack_query.decode_stack()[0])
upvotes_stack = yt_stack_query.decode_stack()[1]
views_stack = yt_stack_query.decode_stack()[2]

#Filtered tags
tags = yt_stack_query.get_tags()

#Concatenation of lists to insert into the DB
youtube_insert = [(date, upvote, view) for date,upvote,view in zip(dates_yt,upvotes_yt, views_yt)]
stack_insert = [(date, upvote, view) for date,upvote,view in zip(dates_stack,upvotes_stack, views_stack)]
tags_insert = [tuple([tag]) for tag in tags]

#Database generation
conn = sqlite3.connect('yt_stack.db')
cursor = conn.cursor()

cursor.execute('DROP TABLE IF EXISTS youtube;')
cursor.execute('DROP TABLE IF EXISTS stack;')
cursor.execute('DROP TABLE IF EXISTS tag;')

cursor.execute("""CREATE TABLE  youtube (
                    date        VARCHAR(20) ,
                    upvotes     INTEGER     ,
                    views       INTEGER
                );""")

cursor.execute("""CREATE TABLE stack (
                    date        VARCHAR(20) ,
                    upvotes     INTEGER     ,
                    views       INTEGER
                );""")

cursor.execute("""CREATE TABLE tag (
                    tags        VARCHAR(20)
                );""")

cursor.executemany('INSERT INTO youtube (date, upvotes, views) VALUES (?,?,?);',youtube_insert)
cursor.executemany('INSERT INTO stack (date, upvotes, views) VALUES (?,?,?);',stack_insert)
cursor.executemany('INSERT INTO tag (tags) VALUES (?);',tags_insert)
conn.commit()
    
print("\n Done, correctly generated stack exchange and youtube database.")

