<?php 
//if the user clicks the button then we output than we execute the deletes-schedule scripts which deletes all the schedules currently set
$message="Click on the button to delete all schedules";
	if (isset($_GET['deleted']))
	 {
		$username=$_GET['deleted'];
		$message="All schedules have been deleted";
		$command = escapeshellcmd('python3 /var/www/html/include/philips_hue/schedule/delete_schedule.py');
		$output = shell_exec($command);
#echo "<pre>$output</pre>";
		
	}
?>	
<html>
    <head>
        <meta charset="utf-8" />
		<title>Delete Schedule | HAL </title>
		<link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Telex&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Gochi+Hand&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Capriola&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Wallpoet&display=swap" rel="stylesheet">	
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Indie+Flower|Trade+Winds&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Grenze:ital,wght@0,100;1,200&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
		<link rel="stylesheet" media="screen" type="text/css" href="include/style.css">
		<link rel="stylesheet" media="screen" type="text/css" href="style.css">
   
    </head>
 
    <body id="light">
		<div id="wrapper">
		<h1>House Abstraction Layer</h1>
		<h2>HAL</h2>
		<hr style="border: 10px solid green;  border-radius: 5px;" ><br>
		<a href="../mainHAL_PAGE.php" >Go to Home page</a><br><br>
		<a href="./schedule.php" >Go to Schedule page</a>
		<p id ="delete_schedule">Current schedule of the lights are </p>
		<?php
		//this gives the current schedules
		$command = escapeshellcmd('python3 /var/www/html/include/philips_hue/schedule/schedule.py');
		$output = shell_exec($command);
		echo "<pre style=\" text-align:left;margin-left:80px;\">$output</pre>";
		?>

		<br>
		<hr style="border: 10px solid green;  border-radius: 5px;" ><br>
		<!--ask for user to click button to delete schedules-->
		<form id="delete" action="./delete_schedule.php" method = "get">
		Delete schedule of the lights </br>
		<input style="font-size:20px; font-family: 'Balsamiq Sans', cursive;" type="Submit" value="Delete ALL" name="deleted"></input><br><br>
		<span style="font-size:18px; font-family: 'Grenze', serif; color:#000; font-weight:bolder;">******** By default all the schedules will be deleted ********</span>
		
		</form>
		<?php echo "<p id=\"delete_message\">$message</p>"?>
</body>
</html>
