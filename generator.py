import random
import sys
f = open('finalvisits.sql', 'w')
sys.stdout = f
#from IPython.core.display import display, HTML
#display(HTML("<style>.container { width:100% !important; }</style>"))
nfcbedcorrfloor = []
bedidss = random.sample(range(1000, 1399), 40)
cnt = 0
for bedid in bedidss :
    nfc = 2310 + cnt
    corrid =  (bedid - 1000) // 20 + 1405 
    floorid = (bedid - 1000) // 80 + 1400
    temp = (nfc, bedid, corrid, floorid)
    nfcbedcorrfloor.append(temp)
    cnt += 1
    
#print(*nfcbedcorrfloor, sep = '\n')        
#print()                                    
#print()                                  



routine1 = []
routine2 = []
routine3 = []

routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:30:00', '2021-0%d-%d 09:32:00');", "today", 111, 111))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:32:00', '2021-0%d-%d 09:33:00');", "today", 1425, 1429))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:33:00', '2021-0%d-%d 09:40:00');", "today", 1431, 1431))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:40:00', '2021-0%d-%d 10:40:00');", "today", 1438, 1441))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 10:40:00', '2021-0%d-%d 10:41:00');", "today", 1431, 1431))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 18:00:00', '2021-0%d-%d 18:05:00');", "today", 1431, 1431))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 18:05:00', '2021-0%d-%d 18:06:00');", "today", 1425, 1429))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 18:06:00', '2021-0%d-%d 18:07:00');", "today", 111, 111))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 18:07:00', '2021-0%d-%d 19:00:00');", "today", 222, 222))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:00:00', '2021-0%d-%d 19:02:00');", "today", 111, 111))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:02:00', '2021-0%d-%d 19:04:00');", "today", 1425, 1429))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:04:00', '2021-0%d-%d 19:10:00');", "today", 1431, 1431))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:10:00', '2021-0%d-%d 22:00:00');", "today", 1438, 1441))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 22:04:00', '2021-0%d-%d 01:00:00');", "change", 1432, 1437))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 01:03:00', '2021-0%d-%d 01:05:00');", "tomorrow", 1431, 1431))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 01:05:00', '2021-0%d-%d 01:06:00');", "tomorrow", 1425, 1429))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 01:06:00', '2021-0%d-%d 01:07:00');", "tomorrow", 111, 111))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 01:07:00', '2021-0%d-%d 09:30:00');", "tomorrow", 222, 222))


routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:30:00', '2021-0%d-%d 09:32:00');", "today", 333, 333))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 18:06:00', '2021-0%d-%d 19:02:00');", "today", 333, 333))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 01:06:00', '2021-0%d-%d 09:30:00');", "tomorrow", 333, 333))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:33:00', '2021-0%d-%d 10:41:00');", "today", 1430, 1430))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 18:00:00', '2021-0%d-%d 18:05:00');", "today", 1430, 1430))
routine1.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:04:00', '2021-0%d-%d 01:05:00');", "change", 1430, 1430))





routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:30:00', '2021-0%d-%d 09:32:00');", "today", 111, 111))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:32:00', '2021-0%d-%d 09:33:00');", "today", 1425, 1429))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:33:00', '2021-0%d-%d 09:40:00');", "today", 1431, 1431))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:40:00', '2021-0%d-%d 11:40:00');", "today", 1438, 1441))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 11:40:00', '2021-0%d-%d 11:41:00');", "today", 1431, 1431))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 11:41:00', '2021-0%d-%d 12:30:00');", "today", 1466, 1466))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 12:31:00', '2021-0%d-%d 14:40:00');", "today", 1452, 1455))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 14:41:00', '2021-0%d-%d 15:10:00');", "today", 1456, 1465))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 15:10:00', '2021-0%d-%d 16:00:00');", "today", 1438, 1441))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 16:01:00', '2021-0%d-%d 16:02:00');", "today", 1431, 1431))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:00:00', '2021-0%d-%d 19:05:00');", "today", 1431, 1431))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:05:00', '2021-0%d-%d 19:06:00');", "today", 1425, 1429))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:06:00', '2021-0%d-%d 19:07:00');", "today", 111, 111))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:07:00', '2021-0%d-%d 20:00:00');", "today", 222, 222))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 20:00:00', '2021-0%d-%d 20:02:00');", "today", 111, 111))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 20:02:00', '2021-0%d-%d 20:04:00');", "today", 1425, 1429))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 20:04:00', '2021-0%d-%d 20:10:00');", "today", 1431, 1431))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 20:10:00', '2021-0%d-%d 23:00:00');", "today", 1438, 1441))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 23:04:00', '2021-0%d-%d 02:00:00');", "change", 1432, 1437))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 02:03:00', '2021-0%d-%d 02:05:00');", "tomorrow", 1431, 1431))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 02:05:00', '2021-0%d-%d 02:06:00');", "tomorrow", 1425, 1429))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 02:06:00', '2021-0%d-%d 02:07:00');", "tomorrow", 111, 111))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 02:07:00', '2021-0%d-%d 09:30:00');", "tomorrow", 222, 222))


routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:30:00', '2021-0%d-%d 09:32:00');", "today", 333, 333))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:06:00', '2021-0%d-%d 20:02:00');", "today", 333, 333))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 02:06:00', '2021-0%d-%d 09:30:00');", "tomorrow", 333, 333))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:33:00', '2021-0%d-%d 16:02:00');", "today", 1430, 1430))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:00:00', '2021-0%d-%d 19:05:00');", "today", 1430, 1430))
routine2.append(("insert into visits values (%d, %d,  '2021-0%d-%d 20:04:00', '2021-0%d-%d 02:05:00');", "change", 1430, 1430))







routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:30:00', '2021-0%d-%d 09:32:00');", "today", 111, 111))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:32:00', '2021-0%d-%d 09:33:00');", "today", 1425, 1429))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:33:00', '2021-0%d-%d 09:40:00');", "today", 1431, 1431))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:40:00', '2021-0%d-%d 10:40:00');", "today", 1438, 1441))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 10:40:00', '2021-0%d-%d 10:41:00');", "today", 1431, 1431))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 10:41:00', '2021-0%d-%d 13:30:00');", "today", 1442, 1451))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 13:30:00', '2021-0%d-%d 14:30:00');", "today", 1452, 1455))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 14:30:00', '2021-0%d-%d 15:03:00');", "today", 1456, 1465))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 15:03:00', '2021-0%d-%d 15:05:00');", "today", 1431, 1431))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 15:05:00', '2021-0%d-%d 15:06:00');", "today", 1425, 1429))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 15:06:00', '2021-0%d-%d 15:07:00');", "today", 111, 111))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 15:07:00', '2021-0%d-%d 16:30:00');", "today", 222, 222))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 16:30:00', '2021-0%d-%d 16:32:00');", "today", 111, 111))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 16:32:00', '2021-0%d-%d 16:34:00');", "today", 1425, 1429))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 16:34:00', '2021-0%d-%d 16:40:00');", "today", 1431, 1431))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 16:40:00', '2021-0%d-%d 19:00:00');", "today", 1438, 1441))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 19:00:00', '2021-0%d-%d 19:02:00');", "today", 1431, 1431))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 00:30:00', '2021-0%d-%d 00:32:00');", "tomorrow", 1431, 1431))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 00:32:00', '2021-0%d-%d 00:33:00');", "tomorrow", 1425, 1429))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 00:33:00', '2021-0%d-%d 00:34:00');", "tomorrow", 111, 111))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 00:34:00', '2021-0%d-%d 09:30:00');", "tomorrow", 222, 222))


routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:30:00', '2021-0%d-%d 09:32:00');", "today", 333, 333))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 15:06:00', '2021-0%d-%d 16:32:00');", "today", 333, 333))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 00:33:00', '2021-0%d-%d 09:30:00');", "tomorrow", 333, 333))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 09:33:00', '2021-0%d-%d 15:05:00');", "today", 1430, 1430))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 16:34:00', '2021-0%d-%d 19:02:00');", "today", 1430, 1430))
routine3.append(("insert into visits values (%d, %d,  '2021-0%d-%d 00:30:00', '2021-0%d-%d 00:32:00');", "tomorrow", 1430, 1430))


#skopos autwn twn metavlitwn einai na doume poses apo kathe routina eixame gia na elegksoume an einai
#swsto to plithos twn tuples sto table receives_services

routcnt1 = 0      #edw kratame poses fores synolika erxetai i kathe routina gia logous elegxou
routcnt2 = 0
routcnt3 = 0



journal = []            #edw kratame poies routines apo tis treis exei toulaxiston mia fora o kathe pelatis
for cnt in range (40):
    journal.append([0, 0, 0])

stayinfo = []          #edw kratame mina pou erxetai, prwti kai teleutaia mera

for cli in range(40):
    stay = random.randint(1,10)
    month = random.randint(1,3)
    arrivalday = random.randint(10, (28 - stay))  #meres diamonis apo 10-19, edw asxoloumaste mono me monades
                                                 #giati dekades yparxoun idi sta queries

    stayinfo.append((month, arrivalday, arrivalday + stay))
    
    for day in range(stay):
        todayroutnum = random.randint(1,3)
        if todayroutnum == 1: 
            routine = routine1
            journal[cli][0] = 1
            routcnt1 += 1
        if todayroutnum == 2: 
            routine = routine2
            journal[cli][1] = 1
            routcnt2 += 1
        if todayroutnum == 3: 
            routine = routine3
            journal[cli][2] = 1
            routcnt3 += 1
            
        for tuple in range(len(routine)):
            #orismata: nfc, roomid, minas, mera, minas, mera
            #to mono pou den ypologizoume einai o minas
            nfc = nfcbedcorrfloor[cli][0]   #nfcid
            
            if routine[tuple][2] == 111: roomid = nfcbedcorrfloor[cli][2]   #111 antistoixei se diadromo
            elif routine[tuple][2] == 222: roomid = nfcbedcorrfloor[cli][1] #222 antistoixei se dwmatio
            elif routine[tuple][2] == 333: roomid = nfcbedcorrfloor[cli][3] #333 antistoixei se orofo
            else : roomid = random.randint(routine[tuple][2], routine[tuple][3])
            
            if routine[tuple][1] == "today": 
                startday = arrivalday + day
                endday = arrivalday + day
            elif routine[tuple][1] == "change":
                starday = arrivalday + day
                endday = arrivalday + day + 1
            else:
                startday = arrivalday + day + 1
                endday = arrivalday + day + 1
                
            arguments = (nfc, roomid, month, startday, month, endday)
            print(routine[tuple][0]% arguments) 


print('\n' * 40)






















queryformat = "insert into has_access values (%d, %d, '2021-0%d-%d 09:30:00', '2021-0%d-%d 09:30:00');"

for cli in range(40):    

    #prwta vazoymeta sigoura

    nfc = nfcbedcorrfloor[cli][0]
    month = stayinfo[cli][0]
    fday = stayinfo[cli][1]
    lday = stayinfo[cli][2]

    for i in range(3):                               #access se dwmatio, diadromo, orofo
        roomid = nfcbedcorrfloor[cli][i + 1]
        arg = (nfc, roomid, month, fday, month, lday)
        print(queryformat % arg)

    for i in range(5):
        arg = (nfc, 1425 + i, month, fday, month, lday)  #ola ta asanser
        print(queryformat % arg)

    arg = (nfc, 1430, month, fday, month, lday)        #isogeio
    print(queryformat % arg)

    arg = (nfc, 1431, month, fday, month, lday)         #reception
    print(queryformat % arg)

    for i in range(4):
        arg = (nfc, 1438 + i, month, fday, month, lday)  #ola ta estiatoria
        print(queryformat % arg)


    for i in range(6):
        arg = (nfc, 1432 + i, month, fday, month, lday)  #ola ta bar
        print(queryformat % arg)

    #koitame tis routines gia ta ypoloipa

    hasroutine2 = journal[cli][1]  
    hasroutine3 = journal[cli][2]  

    if hasroutine2 == 1 or hasroutine3 == 1:       #gym kai sauna
        for i in range(4):
            arg = (nfc, 1452 + i, month, fday, month, lday)  #gym
            print(queryformat % arg)

        for i in range(10):
            arg = (nfc, 1456 + i, month, fday, month, lday)  #sauna
            print(queryformat % arg)



    if hasroutine2 == 1:
        arg = (nfc, 1466, month, fday, month, lday)  #hair salon
        print(queryformat % arg)


    if hasroutine3 == 1:
        for i in range(10):
            arg = (nfc, 1442 + i, month, fday, month, lday)  #conference room
            print(queryformat % arg)




print('\n' * 40)




















queryformat = "insert into registered_in values (%d, %d, '2021-0%d-%d 09:30:00');"


for cli in range(40):                

    nfc = nfcbedcorrfloor[cli][0]
    month = stayinfo[cli][0]
    fday = stayinfo[cli][1]

    hasroutine2 = journal[cli][1]  
    hasroutine3 = journal[cli][2]

    if hasroutine2 == 1 or hasroutine3 == 1:        #adeia gia sauna kai gym
        for i in range(2):
            arg = (nfc, 102 + i, month, fday)
            print(queryformat % arg)

    if hasroutine2 == 1:
        arg = (nfc, 104, month, fday)
        print(queryformat % arg)

    if hasroutine3 == 1:
        arg = (nfc, 105, month, fday)
        print(queryformat % arg)

print('\n' * 40)

print(routcnt1)  
print(routcnt2)
print(routcnt3)
print(*journal, sep='\n')
print(*stayinfo, sep='\n')
f.close()


