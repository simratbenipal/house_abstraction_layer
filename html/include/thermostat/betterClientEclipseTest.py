import paho.mqtt.client as mqtt
import time
##
def on_message(client, userdata, message):
	print("message recieved ",str(message.payload.decode("utf-8")))
	print("message topic=", message.topic)
	print("message qos=", message.qos)
	print("message retain flag=", message_retain)
##############
broker_address="192.168.50.147"
print("creating new instance")
client=mqtt.Client("P1")
client.on_message=on_message
print("connecting to broker")
client.connect(broker_address)
client.loop_start()
print("Subscribing to topic","zigbee2mqtt/Therm")
client.subscribe("zigbee2mqtt/Therm")
client.publish("zigbee2mqtt/Therm/get/local_temperature/","")
time.sleep(30)
client.loop_stop()
