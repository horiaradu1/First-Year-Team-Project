import mysql.connector
from mysql.connector import Error
from datetime import datetime, date

listOfPeople = ["laura", "horia"]
listOfEvents = []
timeToday = str(datetime.date(datetime.now()))
superlist = [[0]*24, [0]*24, [0]*24, [0]*24, [0]*24, [0]*24, [0]*24]


from datetime import datetime

def days_between(d1, d2):
    d1 = datetime.strptime(d1, "%Y-%m-%d")
    d2 = datetime.strptime(d2, "%Y-%m-%d")
    return ((d2 - d1).days)

try:
    connection = mysql.connector.connect(host='dbhost.cs.man.ac.uk',
                                         database='2019_comp10120_y4',
                                         user='g63968ef',
                                         password='database')

    sql_select_Query = "select * from HasEvent"
    cursor = connection.cursor()
    cursor.execute(sql_select_Query)
    hasEvent = cursor.fetchall()
    #print("Total number of rows in Users is: ", cursor.rowcount)

    # #print("\nPrinting each users record")
    # for row in hasEvent:
    #     print("Username = ", row[0], )
    #     print("Event id = ", row[1])
    #     # print("First Name  = ", row[2])
    #     # print("Last Name  = ", row[3])
    #     # print("Email  = ", row[4], "\n")
    #     if row[0] in listOfUsernames:
    #         listOfEvents.append(row[1])


    def createMeetingList(listOfUsernames):
        for row in hasEvent:
            if row[0] in listOfUsernames:
                listOfEvents.append(row[1])

        for event in listOfEvents:
            sql_select_Query = f"select StartTime, EndTime from Events where EventID = {event}"
            #cursor = connection.cursor()
            cursor.execute(sql_select_Query)
            event = cursor.fetchall()

            endNums = []
            startNums = []

            event = str(event)
            event = event.replace("[(datetime.datetime(", "")
            eventStartIndex = event.find(")")
            eventEndIndex = event.find("(")
            eventStart = event[:eventStartIndex]
            eventEnd = event[eventEndIndex+1:]
            eventEnd = eventEnd[:eventEnd.find(")")]
            
            print(eventStart)
            print(eventEnd)

            startNums = eventStart.rsplit(",")
            for x in range(len(startNums)):
                startNums[x] = startNums[x].strip()
            endNums = eventEnd.rsplit(",")
            for y in range(len(endNums)):
                endNums[y] = endNums[y].strip()

            stringStartDate = ""
            stringEndDate = ""

            startTime = int(startNums[3])# + "-" + startNums[4] ## for minutes
            endTime = int(endNums[3])# + "-" + endNums[4] ## for minutes

            for dateItem in range(3):
                if dateItem > 0:
                    stringStartDate = stringStartDate + "-" + startNums[dateItem]
                    stringEndDate = stringEndDate + "-" + endNums[dateItem]
                
                else:
                    stringStartDate = stringStartDate + startNums[dateItem]
                    stringEndDate = stringEndDate + endNums[dateItem]


            dateDifference = days_between(timeToday, stringStartDate)
            if 0 <= dateDifference < 7:
                if dateDifference != 0:
                    endTime += 24*dateDifference
            
            hoursBetween = endTime - startTime
            if 0 <= dateDifference < 7:
                variableTime = startTime
                variableDate = dateDifference
                for hours in range(hoursBetween):
                    if variableTime == 24:
                        variableDate += 1
                        variableTime = 0
                    try:
                        superlist[variableDate][variableTime] += 1
                        variableTime += 1
                    except:
                        break
        return superlist
    
    print(createMeetingList(listOfPeople))

        
           



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