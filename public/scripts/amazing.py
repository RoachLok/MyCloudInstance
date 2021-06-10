import sqlite3, json

conn = sqlite3.connect('scripts/municipalities.db')
cursor = conn.cursor()
cursor.execute('select * from municipa where (pop/area)<12.5 or (pop/area<16 and pop<250);')

print(json.dumps(cursor.fetchall()))