import mysql.connector
from mysql.connector import errorcode
import sys


#def validate():

def error(err):
    print(f"{err.msg}")
    exit(f"{err.errno}")

def connect():
    try:
        mydb = mysql.connector.connect(
            host="localhost",
            user="root",
            password="1234"
        )
        return mydb
    except mysql.connector.Error as err:
        error(err)
        

def execute():
    mydb = connect()
    try:
        mycursor = mydb.cursor()
        mycursor.execute(f"CREATE DATABASE {sys.argv[1]}")
        mycursor.execute(f"CREATE USER {sys.argv[1]}")
        mycursor.execute(f"GRANT SELECT, CREATE, DELETE, UPDATE on {sys.argv[1]}.* to {sys.argv[1]}")
    except mysql.connector.Error as err:
        error(err)    


if sys.argv[1] and sys.argv[2]:
    execute()