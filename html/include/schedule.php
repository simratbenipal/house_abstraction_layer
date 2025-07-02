<html>
    <head>
        <meta charset="utf-8" />
        <title>Schedule | HAL </title>
		<link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Telex&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Gochi+Hand&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Capriola&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Wallpoet&display=swap" rel="stylesheet">	
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Indie+Flower|Trade+Winds&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
		
    	<link rel="stylesheet" media="screen" type="text/css" href="style.css">
   
    </head>
 
    <body id="light">
		<div id="wrapper">

			<h1>House Abstraction Layer</h1>
			<h2>HAL</h2>
			<hr style="border: 10px solid green;  border-radius: 5px;" ><br>
			<a href="../mainHAL_PAGE.php">Go to Home page</a>
			<p id="schedule"><br>Schedule of the lights are </p>
			
			<?php
			//execute the command which displays the schedules currently set and display it on the webpage
			$command = escapeshellcmd('python3 /var/www/html/include/philips_hue/schedule/schedule.py');
			$output = shell_exec($command);
			echo "<pre style=\" text-align:left;margin-left:80px;\">$output</pre>";
			?>
			<hr style="border: 10px solid green;  border-radius: 5px;" ><br>
			<p  id="schedule" style="color:#000">Set the schedules<a href="./set_schedule.php" >Click Here</a>
			<p  id="schedule" style="color:#000">Delete the schedules<a href="./delete_schedule.php" >Click Here</a>
</body>
</html>
