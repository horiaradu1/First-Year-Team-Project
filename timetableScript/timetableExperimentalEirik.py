import mysql.connector
from mysql.connector import Error
from datetime import datetime, date

listOfUsernames = ["laura", "horia"]
listOfEvents = []
timeToday = str(datetime.date(datetime.now()))
superlist = [[0]*24, [0]*24, [0]*24, [0]*24, [0]*24, [0]*24, [0]*24]


from datetime import datetime

def days_between(d1, d2):
    d1 = datetime.strptime(d1, "%Y-%m-%d")
    d2 = datetime.strptime(d2, "%Y-%m-%d")
    return abs((d2 - d1).days)

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

    print(superlist)
    print(datetime.date(datetime.now()))
    timeToday = timeToday.replace("-", ", ")
    print(timeToday)



    sql_select_Query = f"select StartTime, EndTime from Events where EventID = 1"
    #cursor = connection.cursor()
    cursor.execute(sql_select_Query)
    event = cursor.fetchall()
    event = str(event[0]).split(",")
    start = event[0] + event[1] + event[2] + event[3] + event[4]
    index = (start.find("2"))
    start = start[19:28]
    

    print(days_between("2020-02-19", "2020-02-25"))
    print(start)



except Error as e:
    print("Error reading data from MySQL table", e)
finally:
    if (connection.is_connected()):
        connection.close()
        cursor.close()
        print("MySQL connection is closed")



# 1) Select after user
# 2) Select after date (compare today and one week ahead)
# 3) Add this to a list of all relevant events
# 4) startdate - eventdate, if > 7 out of range (must remove abs for this)