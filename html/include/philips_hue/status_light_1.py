#!/usr/bin/python
from phue import Bridge
#to make things simple we will use a text file for bridge IP
file_opened = open("/var/www/html/include/philips_hue/IP_Bridge.txt","r")
ip_bridge = file_opened.read()
ip_bridge = ip_bridge.rstrip('\n')
#ip_bridge is the IP of the bridge
file_opened.close()

bridge = Bridge(ip_bridge) 
#in this we will turn onn the light
lights = bridge.lights

if(bridge.get_light(4 , 'on')):
	print("Philips Hue having Light#4 is turned on")
else:
	print("Philips Hue having Light#4 is turned off")
