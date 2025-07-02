import paho.mqtt.client as mqtt
import time
##
#def on_message(client, userdata, message):					#creating a function to handle the MQTT callback
#	print("message recieved to topic: ",message.topic)			#print a simple message and topic to make sure it has been recieved
##############
broker_address="192.168.50.147"							#setting the address of our mosquitto broker for MQTT messages
client=mqtt.Client("P1")							#creating MQTT client using a uniqur ID
#client.on_message=on_message							#binding the on_message function to our client for when it recieves a callback
client.connect(broker_address)							#connecting client to our broker
client.loop_start()								#starting a loop to listen for messages published to any topic we subscribe to
client.subscribe("zigbee2mqtt/Therm")						#subscribing to our thermostat
client.publish("zigbee2mqtt/Therm/set",'{"system_mode":"heat"}')		#sending a MQTT message to turn heating operation on
time.sleep(5)									#sleep for a second to recieve the callback
client.loop_stop()
print("Heat has been turned on")									#stop loop listening for callbacks
