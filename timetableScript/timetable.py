import mysql.connector
from mysql.connector import Error

try:
    connection = mysql.connector.connect(host='dbhost.cs.man.ac.uk',
                                         database='2019_comp10120_y4',
                                         user='g63968ef',
                                         password='database')

    sql_select_Query = "select * from Users"
    cursor = connection.cursor()
    cursor.execute(sql_select_Query)
    records = cursor.fetchall()
    print("Total number of rows in Users is: ", cursor.rowcount)

    print("\nPrinting each users record")
    for row in records:
        print("Username = ", row[0], )
        print("Hashed password = ", row[1])
        print("First Name  = ", row[2])
        print("Last Name  = ", row[3])
        print("Email  = ", row[4], "\n")

except Error as e:
    print("Error reading data from MySQL table", e)
finally:
    if (connection.is_connected()):
        connection.close()
        cursor.close()
        print("MySQL connection is closed")
