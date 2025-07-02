#!/usr/bin/env python3
from crontab import CronTab
file_opened = open("time_specified.txt","r")
time_value = file_opened.read()
#we will add a command into crontab file
my_cron = CronTab(user="www-data")
for jobs in my_cron:
	#print (jobs)
	if jobs.comment == 'turn off the gpio pin':
		my_cron.remove(jobs)
new_job = my_cron.new(command="python3 /var/www/html/include/turn_off.py", comment="turn off the gpio pin")
#specify the time in crontab
new_job.hour.on(time_value)
my_cron.write()

#print("Cron job scheduled at "+time_value+" under the user www-data")
