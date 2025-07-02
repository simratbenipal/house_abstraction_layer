
<?php
//get the brightness level from submissiion
$temperature=$_GET['temperature'];
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Temperature | HAL </title>
		<link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Telex&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Gochi+Hand&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Capriola&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Wallpoet&display=swap" rel="stylesheet">	
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Indie+Flower|Trade+Winds&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
    	<link rel="stylesheet" media="screen" type="text/css" href="./../style.css">
   </head>
 
    <body id="light">
		<div id="wrapper"><br>
			<h1>House Abstraction Layer</h1>
			<h2>HAL</h2>
			<hr style="border: 10px solid green;  border-radius: 5px;" ><br>
			<a id="brightness_link" href="./../../mainHAL_PAGE.php" >Home page</a><br><br><br><br>
			<p id="brightness" >Temperature Chosen : <?php echo $temperature?> <br></p>

			<?php
//this temperature should be written to an external file that will e read by the set script to change the setHeatPint to this new temperature
//now we have to write this to external file
$myfile = fopen("temperature_for_set_heating_point.txt", "w") or die("Unable to open file!");
fwrite($myfile, $temperature);
fclose($myfile);
			// now we have to decide whether to turn on the heat or turn off the heat 
			// for this we need the current set temperature
			$command = escapeshellcmd('python3 /var/www/html/include/thermostat/getTemp.py');
			$currTemp = shell_exec($command);
			$commandIDK = escapeshellcmd('python3 /var/www/html/include/thermostat/setTempPoint.py');

			//assign the current temperaure into $currTemp variable
			
			echo "<p id=\"brightness\" >Current Temperature set :  $currTemp  <br></p>";
			if ($temperature < $currTemp)
			{			
				echo "<p id=\"brightness\" > This temperature is less the current set temperature, thus heat be turned off. </p>";
				//run the heat turn off script;
				$command = escapeshellcmd('python3 /var/www/html/include/thermostat/setHeatOff_Final.py');
				$output = shell_exec($command);
				echo "<pre>$output</pre>";
			}
			else //meaning the set temperature is more than current temperature this means heat will turn of
			{
				echo "<p id=\"brightness\" > This temperature is more than the current set temperature, thus the heat will be turned on.</p>";
				// run the heat turn onn script;
				$command = escapeshellcmd('python3 /var/www/html/include/thermostat/setHeatOn_Final.py');
				$output = shell_exec($command);
				echo "<pre>$output</pre>";
}
			
			?>
	</body>
</html>
