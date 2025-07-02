
<?php
//get the brightness level from submissiion
$furnace_control=$_GET['furnace_control'];
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Furnace Status | HAL </title>
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
			<p id="brightness" >Status of the furnace has been changed!!<br></p>
			<?php
			if($furnace_control == 0)
			{
				#turn off the heat
				$command = escapeshellcmd('python3 /var/www/html/include/thermostat/setHeatOff_Final.py');
				$output = shell_exec($command);
				#echo "<pre>$output</pre>";
			}
			else
			{	
				#turn on the heat
				$command = escapeshellcmd('python3 /var/www/html/include/thermostat/setHeatOn_Final.py');
				$output = shell_exec($command);
				#echo "<pre>$output</pre>";
			}
			$command = escapeshellcmd('python3 /var/www/html/include/thermostat/currentStatus.py');
			$outpuT = shell_exec($command);
			echo "<p id=\"brightness\">$outpuT</p>";
			
			
			?>
	</body>
</html>
