import paho.mqtt.client as mqtt
import time
##
def on_message(client, userdata, message):
	print("message recieved ",str(message.payload.decode("utf-8")))
	print("message topic=", message.topic)
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
client.publish("zigbee2mqtt/Therm/set","{\"system_mode\":\"idle\"}")
time.sleep(4)
client.loop_stop()
