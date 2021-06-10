from os import system
import pandas as pd
import sqlite3, json

def get_pop_json():
    try:
        with open('muni_pop.json', 'r', encoding='utf-8') as muni_pop:   
            return json.load(muni_pop)
    except:
        try:
            print(' --  No JSON found  --')
            print('\n... Generating new one from population_query.py ...')
            system('py population_query.py')
            with open('muni_pop.json', 'r', encoding='utf-8') as muni_pop:   
                print('\n\nJSON Successfully generated. Continuing db dump.\n')
                return json.load(muni_pop)
        except:
            print('No JSON found and new one could not be created.')
            exit()

if __name__ == "__main__":
    pop_json = get_pop_json()
    muni_xls = pd.read_excel('municipios_export_20210601_001847.csv.xls', usecols=[1,3,6,8])

    conn = sqlite3.connect('municipalities.db')
    cursor = conn.cursor()

    cursor.execute('DROP TABLE IF EXISTS municipa;')
    cursor.execute("""CREATE TABLE municipa (
                        muni    VARCHAR(25) ,
                        pop     INTERGER    ,
                        area    DECIMAL(7,2),
                        auco    VARCHAR(25) ,
                        city    VARCHAR(25) 
                    );""")
    
    for index, row in muni_xls.iterrows():
        if pd.isna(row['DENOMINACION']): # End of file reached
            break
        try:
            cursor.execute(f"""INSERT INTO municipa (muni, pop, area, auco, city)
                            VALUES ("{row['DENOMINACION']}", {pop_json[row['PROVINCIA']][row['DENOMINACION']]},
                                {row['SUPERFICIE']}, "{row['COMUNIDAD_AUTONOMA']}", "{row['PROVINCIA']}");""")
        except:
            print('Municipality already in table or trying to insert autonomous locality.')
            print('Item:',row['DENOMINACION'], 'from',row['PROVINCIA'])

    conn.commit()
    print('\n Done, correctly generated municipalities database.')