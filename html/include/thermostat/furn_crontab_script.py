#!/usr/bin/env python3
from crontab import CronTab
file_opened = open("furn_time_specified.txt","r")
time_value = file_opened.read()
#we will add a command into crontab file
my_cron = CronTab(user="www-data")


for jobs in my_cron:
	if jobs.comment == 'turn on the furnace pin':
		my_cron.remove(jobs)

new_job = my_cron.new(command="python3 /var/www/html/include/thermostat/setHeatOn_Final.py", comment="turn on the furnace pin")
#specify the time in crontab
new_job.hour.on(time_value)
my_cron.write()
for jobs in my_cron:
	
	if jobs.comment == 'turn on the furnace pin':
		print (jobs)
my_cron.remove(jobs)

print("Cron job scheduled at "+time_value+" under the user www-data")
