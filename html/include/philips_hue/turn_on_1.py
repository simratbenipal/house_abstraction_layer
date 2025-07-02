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

#lets get the name of all the lights connected to this bridge
for l in lights:
    name_light = l.name
    #turn them on
    bridge.set_light(name_light,'on', True)
