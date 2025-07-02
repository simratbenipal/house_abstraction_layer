#!/usr/bin/python
from phue import Bridge
#to make things simple we will use a text file for bridge IP
file_opened = open("/var/www/html/include/philips_hue/IP_Bridge.txt","r")
ip_bridge = file_opened.read()
ip_bridge = ip_bridge.rstrip('\n')
#ip_bridge is the IP of the bridge
file_opened.close()

bridge = Bridge(ip_bridge) 

for i in range(20):
	print(bridge.delete_schedule(i))
