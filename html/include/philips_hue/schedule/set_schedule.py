#!/usr/bin/python
from phue import Bridge
#to make things simple we will use a text file for bridge IP
file_opened = open("/var/www/html/include/philips_hue/IP_Bridge.txt","r")
ip_bridge = file_opened.read()
ip_bridge = ip_bridge.rstrip('\n')
#ip_bridge is the IP of the bridge
file_opened.close()

bridge = Bridge(ip_bridge) 

#open the file which has time specified 
file_opened = open("/var/www/html/include/philips_hue/schedule/schedule_data.txt","r")
data = file_opened.read()
data = data.split("+")
file_opened.close()
print(data)
name=data[0] #name of schedule
time=data[1] #time of schedule
ID=data[2] #light id of schedule
decision=data[3] #true or false
if(decision =='True'):
	decision = True
else:
	decision = False
description=data[4] #description
control={'on': decision}


# Create a schedule for a light, arguments are name, time, light_id, data (as a dictionary) and optional description

bridge.create_schedule(name, time, 4 , control, description )
print(bridge.get_schedule())

