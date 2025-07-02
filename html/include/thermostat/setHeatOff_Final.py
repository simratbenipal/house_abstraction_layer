
import paho.mqtt.client as mqtt
import time
##
#def on_message(client, userdata, message):					#creating function to handle callbacks from MQTT broker
#	print("message recieved to topic ",message.topic)			#print mesage confirmation message for error checking
##############
broker_address="192.168.50.147"							#setting the broker address to out mosquitto broker
client=mqtt.Client("HAL")							#creating a client object using a unique ID
#client.on_message=on_message							#binding our function to client object so that it will handle callbacks
client.connect(broker_address)							#connecting our client to the mosquitto broker
client.loop_start()								#start loop to listen to callbacks
client.subscribe("zigbee2mqtt/Therm")						#subscribe to our thermostat to recieve messages
client.publish("zigbee2mqtt/Therm/set",'{"system_mode":"idle"}')		#sending a message to our thermostat through the broker
time.sleep(1)									#sleep for a second to recieve the message properly
client.loop_stop()
print("Heat has been turned off")								#close out the loop listening for callbacks
