
<?php
//get the brightness level from submissiion
$light_status=$_GET['light_control'];
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Light | HAL </title>
		<link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Telex&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Gochi+Hand&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Capriola&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Wallpoet&display=swap" rel="stylesheet">	
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Indie+Flower|Trade+Winds&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
		<link rel="stylesheet" media="screen" type="text/css" href="include/style.css">
    	<link rel="stylesheet" media="screen" type="text/css" href="style.css">
   
    </head>
 
    <body id="light">
		<div id="wrapper">

		<h1>House Abstraction Layer</h1>
		<h2>HAL</h2>
		<hr style="border: 10px solid green;  border-radius: 5px;" ><br>
		<a  id="light_change" href="../mainHAL_PAGE.php" >Go to Home page</a>
		<p id="light_change">Status of the light has been changed</p>
		<br>
		<?php

		if ($light_status == 1)
		{
			$command = escapeshellcmd('python3 /var/www/html/include/philips_hue/turn_on_1.py');
			$output = shell_exec($command);
			echo "<p id=\"light_change\">Light has been turned on</p>";
		}
		else
		{
			$command = escapeshellcmd('python3 /var/www/html/include/philips_hue/turn_off_1.py');
			$output = shell_exec($command);
			echo "<p id=\"light_change\">Light has been turned off</p>";
		}
		?>
</body>
</html>
