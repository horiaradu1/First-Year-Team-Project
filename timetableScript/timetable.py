import mysql.connector
from mysql.connector import Error

listOfUsernames = ["laura", "horia"]
listOfEvents = []
superlist = []

try:
    connection = mysql.connector.connect(host='dbhost.cs.man.ac.uk',
                                         database='2019_comp10120_y4',
                                         user='g63968ef',
                                         password='database')

    sql_select_Query = "select * from HasEvent"
    cursor = connection.cursor()
    cursor.execute(sql_select_Query)
    hasEvent = cursor.fetchall()
    print("Total number of rows in Users is: ", cursor.rowcount)

    print("\nPrinting each users record")
    for row in hasEvent:
        print("Username = ", row[0], )
        print("Event id = ", row[1])
        # print("First Name  = ", row[2])
        # print("Last Name  = ", row[3])
        # print("Email  = ", row[4], "\n")
        if row[0] in listOfUsernames:
            listOfEvents.append(row[1])
        
    print(listOfEvents)

    

    for event in listOfEvents:
        sql_select_Query = f"select StartTime, EndTime from Events where EventID = {event}"
        #cursor = connection.cursor()
        cursor.execute(sql_select_Query)
        events = cursor.fetchall()
        print(events)





except Error as e:
    print("Error reading data from MySQL table", e)
finally:
    if (connection.is_connected()):
        connection.close()
        cursor.close()
        print("MySQL connection is closed")
