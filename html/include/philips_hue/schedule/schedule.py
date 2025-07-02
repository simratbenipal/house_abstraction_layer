#!/usr/bin/python
from phue import Bridge
#to make things simple we will use a text file for bridge IP
file_opened = open("/var/www/html/include/philips_hue/IP_Bridge.txt","r")
ip_bridge = file_opened.read()
ip_bridge = ip_bridge.rstrip('\n')
#ip_bridge is the IP of the bridge
file_opened.close()
bridge = Bridge(ip_bridge) 

if(bridge.get_schedule()): #if this is true meaning schedules are set then print the schedules 
	print("INFORMATION: 'on':False means  \"Will Turn off\"")
	print("INFOMRATION: 'on':True means  \"Will Turn on\"")
	print("INFORMATION: Status: \"enabled\" means Schedule is enabled\n")
	print("Curent schedules are:")
	print("ID \tName \t\t Command \t Time \t\t\tStatus \t\t Description")
	print("==\t==== \t\t ======= \t ==== \t\t\t====== \t\t ===========")
	#print the schedules #print the schedules in proper allignment
	schedule = bridge.get_schedule()
	for key,value in schedule.items():
		#print(schedule[each_schedule])
		#print(each_schedule)
#schedule[key] basically means value of the key
		command_do = str(value['command']['body'])
		command_do = command_do.lstrip("{")
		command_do = command_do.rstrip("}")
		schedule =str(key)+"\t"+str(value['name'])+ "    "+"\t" +command_do+"\t" +str(value['time'])+"\t"+str(value['status']  +"\t\t"+ str(value['description']))
		print(schedule)

else: #else print not schedules are set
	print("No schedules are set")

