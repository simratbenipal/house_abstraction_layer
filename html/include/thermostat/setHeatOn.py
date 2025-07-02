import paho.mqtt.client as mqtt
import time
##
def on_message(client, userdata, message):
	print("message recieved to topic: ",message.topic)
##############
broker_address="192.168.50.147"
client=mqtt.Client("HAL")
client.on_message=on_message
client.connect(broker_address)
client.loop_start()
client.subscribe("zigbee2mqtt/Therm")
client.publish("zigbee2mqtt/Therm/set","{\"system_mode\":\"heat\"}")
time.sleep(1)
client.loop_stop()
