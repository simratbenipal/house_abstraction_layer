#!/usr/bin/python
from phue import Bridge
import os
#to make things simple we will use a text file for bridge IP
file_opened = open("/var/www/html/include/philips_hue/IP_Bridge.txt","r")
ip_bridge = file_opened.read()
ip_bridge = ip_bridge.rstrip('\n')
#ip_bridge is the IP of the bridge
file_opened.close()

bridge = Bridge(ip_bridge) 

# If the app is not registered and the button is not pressed, press the button and call connect() (this only needs to be run a single time)
bridge.connect()
print("Raspberry PI has been successfullty linked with Philips Bridge")
	

