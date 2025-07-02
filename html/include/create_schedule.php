<?php 
$name=$_GET['name'];
$id=$_GET['id'];
$year=$_GET['year'];
$month=$_GET['month'];
$day=$_GET['day'];
$hour=$_GET['hour'];
$minute=$_GET['minute'];
$light_control=$_GET['light_control']; # 0 means turn off false
#1 means turn onn true
if($light_control==1)
	$control = "True";
else
	$control="False";

$description=$_GET['description'];
$time = $year."-".$month."-".$day."T".$hour.":".$minute.":00";

$schedule_data = $name."+".$time."+".$id."+".$control."+".$description;
//now we have to write this to external file
$schedule_file = fopen("/var/www/html/include/philips_hue/schedule/schedule_data.txt", "w") or die("Unable to open file!");
fwrite($schedule_file, $schedule_data);
fclose($schedule_file);

#run the command to create the schedule

$command = escapeshellcmd('python3 /var/www/html/include/philips_hue/schedule/set_schedule.py');
$output = shell_exec($command);
#echo "<pre>$output</pre>";

?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Schedule Created | HAL </title>
		<link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Telex&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Gochi+Hand&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Capriola&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Wallpoet&display=swap" rel="stylesheet">	
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Indie+Flower|Trade+Winds&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Grenze:ital,wght@0,100;1,200&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Hind:wght@500&display=swap" rel="stylesheet">
		<link rel="stylesheet" media="screen" type="text/css" href="include/style.css">
				<link rel="stylesheet" media="screen" type="text/css" href="style.css">
   
    </head>
 
    <body id="light">
		<div id="wrapper">

			<h1>House Abstraction Layer</h1>
			<h2>HAL</h2>
			<hr style="border: 10px solid green;  border-radius: 5px;" ><br>
			<a href="../mainHAL_PAGE.php" >Go to Home page</a><br><br>
			<p id ="create_schedule">Schedule has been set<br>
			Visit <a href="./schedule.php" >Schedule page</a> in order to confirm. </p>

</body>
</html>
