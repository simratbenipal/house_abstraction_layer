#!/usr/bin/env python3
import datetime
from datetime import datetime
import time
import os
print("This will turn on the furnace at the given time")
now=datetime.now()
current_time = now.strftime("%H:%M:%S")
print("Current Time =", current_time)

#we will open the file where we stored the time from website
file_opened = open("furn_time_specified.txt","r")
time_value = file_opened.read()
print(time_value)
file_opened.close()
######################################
#call another script to write to the crontab
os.system("python3 furn_crontab_script.py")
