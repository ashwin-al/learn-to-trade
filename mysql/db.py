from tabulate import tabulate
import mysql.connector

con=mysql.connector.connect(host="localhost",port="3306",user="root",password="",database="tech")

'cursor [lets think as cursor is a wire,thats transfor and retrieve the data from the  database ]'

if con:
    print("connected")
else:
    print("connection error")    

def insert(name,age,batch,gender):
    cur=con.cursor()
    sql="insert into dqa (name,age,batch,gender) values (%s,%s,%s,%s)"  # %s is a string
    user=(name,age,batch,gender)
    cur.execute(sql,user)
    con.commit()
    print("Data inserted successfully")
    
def update(name,age,batch,gender,id):
    cur=con.cursor()
    sql="update dqa set name=%s,age=%s,batch=%s,gender=%s where id=%s" # %s is a string
    user=(name,age,batch,gender,id)
    cur.execute(sql,user)
    con.commit()
    print("Data update successfully")
    

def select():
    cur=con.cursor()
    sql="SELECT id,name,age,batch,gender from dqa"
    cur.execute(sql)
    #result=cur.fetchone()
    #result=cur.fetchmany(2)
    result=cur.fetchall()
    print(tabulate(result,headers=["id","name","age","batch","gender"]))

def delete(id):
    cur=con.cursor()
    sql="delete from dqa where id=%s" # %s is a string
    user=(id,)
    cur.execute(sql,user)
    con.commit()
    print("Data Delete successfully")

while True:
    print("1.Insert data")
    print("2.Update data")
    print("3.Select data")
    print("4.Delect data")
    print("5.Exit")
    choice=int(input("enter your choice:"))
    if choice==1:
        name=input("Enter the name: ")
        age=input("Enter the age: ")
        batch=input("Enter the batch: ")
        gender=input("Enter the gender: ")
        insert(name,age,batch,gender)
    
    elif choice==2:
        id=input("Enter the ID: ")
        name=input("Enter the name: ")
        age=input("Enter the age: ")
        batch=input("Enter the batch: ")
        gender=input("Enter the gender: ")
        update(name,age,batch,gender,id)
    
    elif choice==3:
        select()
    
    elif choice==4:
        id=input("Enter the id you want to delete: ")
        delete(id)        
    
    elif choice==5:
        quit()
        
    else:
        print("Invalid selecton...please try again !")        
        