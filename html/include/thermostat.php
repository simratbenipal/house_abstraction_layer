<hr style="border: 1px dashed blue;  border-radius: 5px;" >

<?php
//execute the command to check the temperature 
$command = escapeshellcmd('python3 /var/www/html/include/thermostat/getTemp.py');
$output = shell_exec($command);
echo "<p id=\"thermostat\">Current Temperature of the House : $output Degree Celsius</p>";
?>
<hr style="border: 1px dashed blue;  border-radius: 5px;" >
<p id="thermostat">Current Status of furnace:
<?php
$command = escapeshellcmd('python3 /var/www/html/include/thermostat/currentStatus.py');
$output = shell_exec($command);
echo "<pre>$output</pre>";
?>


<p id="hue" >Turn on/off Furnace 
<form id="hue" action="include/thermostat/furnace.php" method="get">
<select id="hue" name="furnace_control">
<option value="0">OFF</option>
<option value="1">ON</option>
</select>
<input id="hue" type="submit" value="Submit"></input>
</form>
<hr style="border: 1px dashed blue;  border-radius: 5px;" >

<form id="hue" action="./include/thermostat/setTemperature.php" method="get">
Set the Temperature for the Furnace:&nbsp;&nbsp;<input  placeholder="xx" name="temperature" type="number" min="10" max="30">
<input id="hue"type="submit" value="Submit"></input>
</form>
<br>
<hr style="border: 1px dashed blue;  border-radius: 5px;" >
		
		<p id="furnTime">Set a defined time when to turn on the furnace for your return home</p>
		<p id ="furnTime2">At what time do you want to you want to turn on the furnace<br>(0-23) 0--> 12:00AM 23 -->11:00PM</p>
		<form id="furnTime" action="include/thermostat/furnThermostat.php" method="get">
			<select  id ="furnTime" name="FurnTime">
				<option value="0">12:00AM</option>
				<option value="1">1:00AM</option>
				<option value="2">2:00AM</option>
				<option value="3">3:00AM</option>
				<option value="4">4:00AM</option>
				<option value="5">5:00AM</option>
				<option value="6">6:00AM</option>
				<option value="7">7:00AM</option>
				<option value="8">8:00AM</option>
				<option value="9">9:00AM</option>
				<option value="10">10:00AM</option>
				<option value="11">11:00AM</option>
				<option value="12">12:00Noon</option>
				<option value="13">1:0PM</option>
				<option value="14">2:00PM</option>
				<option value="15">3:00PM</option>
				<option value="16">4:00PM</option>
				<option value="17">5:00PM</option>
				<option value="18">6:00PM</option>
				<option value="19">7:00PM</option>
				<option value="20">8:00PM</option>
				<option value="21">9:00PM</option>
				<option value="22">10:00PM</option>
				<option value="23">11:00PM</option>
			</select>
			<input id="main_HAL" type="submit" value="Submit"></input>
		</form>
<hr style="border: 1px dashed blue;  border-radius: 5px;" >
<p id="thermostat">Status of the furnace filters</p>
<?php


$date_filter_change = file_get_contents("/var/www/html/include/date_filter_change.txt");		 	
echo "<p id=\"thermostat\">Filters were changed on ";
echo $date_filter_change;
echo "</p>"; 
$date = strtotime($date_filter_change); // last set time when the filter was changed
#July 19, 2020 2:00 PM
#$date = strtotime("March 19, 2020 2:00 PM"); 
	$remaining = $date - time();
	$days_remaining = abs(floor($remaining / 86400)); // gives the time in days.
	if ($days_remaining > 90)
	{//if the days are more than 90 meaning 3 months then change the filters
		echo "<p id=\"thermostat\">It has been more than 3 Months. <br>Please  change the filter for furnace.<br>";
		echo "Please let the HAL technician know that you have changed the filters.</p>";
	}
	else
		{echo "<p id=\"thermostat\">Filters are in good condition<br>";
		echo "Remember to check them manually</p>";}
	
?>
<p id="thermostat" ><a id ="hue" href="./include/filter.php" >Click Here</a> if you have changed the filter for Furnace</p>
</p>
