import paho.mqtt.client as mqtt
import time
##
def on_message(client, userdata, message):
	msg=message.payload.decode("utf-8")
	print("message recieved ", str(msg))
	print(message.topic)
###
#open this file temperature_for_set_heating_point.txt to read the temperature suplied by the user
read_file = open("./temperature_for_set_heating_point.txt", "r")
temperature = read_file.read();
print(temperature)
print("is this")
broker_address="192.168.50.147"
print("Creating new instance")
client=mqtt.Client("HAL")
client.on_message=on_message
print("connecting to broker")
client.connect(broker_address)
client.loop_start()
print("Subscribing to topic", "zigbee2mqtt/Therm/local_temperature")
client.subscribe("zigbee2mqtt/Therm/")
client.publish("zigbee2mqtt/Therm/set","{\"occupied_heating_setpoint\":\""+temperature+"\"}")
time.sleep(4)
client.loop_stop()

#schedule = bridge.get_schedule()
#	for key,value in schedule.items():
		#print(schedule[each_schedule])
		#print(each_schedule)
#schedule[key] basically means value of the key
#		command_do = str(value['command']['body'])
#		command_do = command_do.lstrip("{")
#		command_do = command_do.rstrip("}")
#		schedule =str(key)+"\t"+str(value['name'])+ "    "+"\t" +command_do+"\t" +str(value['time'])+"\t"+str(value['status']  +"\t\t"+ str(value['description']))
#		print(schedule)
