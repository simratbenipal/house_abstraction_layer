import paho.mqtt.client as mqtt
import time
##
def on_message(client, userdata, message):
	msg=message.payload.decode("utf-8")
	#print("message recieved ", msg)
	local_temperature = msg.split(":")
	local_temperature = local_temperature[1].split(",")
	print(local_temperature[0])
###
broker_address="192.168.50.147"
#print("Creating new instance")
client=mqtt.Client("HAL")
client.on_message=on_message
#print("connecting to broker")
client.connect(broker_address)
client.loop_start()
#print("Subscribing to topic", "zigbee2mqtt/Therm/local_temperature")
client.subscribe("zigbee2mqtt/Therm/#",)
time.sleep(2)
client.loop_stop()

