<hr style="border: 1px dashed blue;  border-radius: 5px;" >
<p style="font-size:18px; font-family: 'Grenze', serif; color:#000; font-weight:bolder;">*********This needs to be performend once**********</p>
<p id ="hue">Connect to the <a id="hue" href="include/connect_philips.php" href="index.php">Philips Bridge</a></p>
<hr style="border: 1px dashed blue;  border-radius: 5px;" >

<p id="hue">Following are the current lights in the network:
<?php
$output = shell_exec('python3 ./include/philips_hue/get_lights.py');
echo "<pre>$output</pre>";?>
<hr style="border: 1px dashed blue;  border-radius: 5px;" >


<p id="hue" >Status of the lights : </p>
<?php
$output = shell_exec('python3 ./include/philips_hue/status_light_1.py');
echo "<pre>$output</pre>";
?>

<hr style="border: 1px dashed blue;  border-radius: 5px;" >


<p id="hue" >Turn on/off Light#1 
<form id="hue" action="include/light_change.php" method="get">
<select id="hue" name="light_control">
<option value="0">OFF</option>
<option value="1">ON</option>
</select>
<input id="hue" type="submit" value="Submit"></input>
</form>
</p>
<hr style="border: 1px dashed blue;  border-radius: 5px;" >
<br>
<form  id="hue" action="./include/brightness.php" method="get">
Change the brightness of the Light#1
<input type="range" id="bright" name="bright" min="0" max="255"></input>
<input id="hue"type="submit" value="Submit"></input>
</form>
</p>
<hr style="border: 1px dashed blue;  border-radius: 5px;" >
<p id="hue" ><a id ="hue" href="./include/schedule.php" >Schedule</a> for Philips Hue
</p>
<hr style="border: 1px dashed blue;  border-radius: 5px;" >

