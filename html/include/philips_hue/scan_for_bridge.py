#!/usr/bin/python
import os
import time
#this script will scan for the IP of the PHilips_hue

#1 run the nmap scan to get the hosts on the network and put it into the file
#2 read that file and find the philips hue line
#3 cut it and get the IP from the string
#4 add that the the IP_Bridge.txt file
file_opened = open("/var/www/html/include/philips_hue/network_ip.txt","r")
ip_network = file_opened.read()
ip_network = ip_network.rstrip('\n')
#ip_bridge is the IP of the bridge
file_opened.close()
network = "192.168."+ip_network+".0/24"

#1 run the nmap scan to get the hosts on the network and put it into the file
command = "nmap -sL " + network + "| grep Philips > /var/www/html/include/philips_hue/nmap.txt"
os.system(command)
#2 read that file and find the philips hue line
#3 cut it and get the IP from the string
file_opened = open("/var/www/html/include/philips_hue/nmap.txt","r")
bridge_ip = file_opened.read()
#if bridge_ip is zero error no ip found try again
if (bridge_ip):
	print("Philips Bridge has been found")
	bridge_ip = bridge_ip.split()
	bridge_ip[5] = bridge_ip[5].lstrip("(")
	bridge_ip[5] = bridge_ip[5].rstrip(")")
	print(bridge_ip[5])
	#add the IP into the file
	file_opened2 = open("/var/www/html/include/philips_hue/IP_Bridge.txt","w")
	file_opened2.write(bridge_ip[5])
	print("Will try to connect with "+bridge_ip[5]+" Philips Bridge")
	file_opened2.close()
	file_opened.close()
	print("Please press the Link button on the Philips Bridge")
	os.system("python3 /var/www/html/include/philips_hue/connect_bridge.py")
	print("Raspberry PI has been successfullty linked with Philips Bridge")

else:
	print("No Philips Bridge has been found")

file_opened.close()

