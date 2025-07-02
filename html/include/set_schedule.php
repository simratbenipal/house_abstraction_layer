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
			<a href="./schedule.php" >Go to Schedule page</a>
			<p id="set_schedule">Set schedule of the lights </p>

			<form id="set_schedule" action="./create_schedule.php" method = "get">
			Enter the name : &nbsp;&nbsp;&nbsp;<input id="set_schedule" required type="text" name="name" placeholder="Name of Schedule"></input><br>
			Enter the light id : <input  id="set_schedule" required type="number" name="id" placeholder="Select 4 here"></input><br>
			<span style="font-size:18px; font-family: 'Grenze', serif; color:#000; font-weight:bolder;">******Please select 4 as light ID and use xx format for the time below******<br><!--because that is the only light currently in the system-->
			******Select the date in future******</span><br>

			Please select the time: &nbsp;<input id="set_schedule2"  required  type="number" placeholder="Year" name="year" min="2020" max="2025"></input>
			<input id="set_schedule2"  required type="number" name="month" min="01" max="12" placeholder="Month(xx)" pattern="[0-9]{2}" title="Month (xx)"></input>
			<input id="set_schedule2" required type="number" name="day" min="1" max="31" placeholder="Day(xx)" pattern="[0-9]{2}" title="Day (xx)" ></input>
			<input id="set_schedule2" required type="number" name="hour" min="1" max="24" placeholder="Hour(xx)" pattern="[0-9]{2}" title="Hour (xx)" ></input>
			<input  id="set_schedule2"required type="number" name="minute" min="0" max="59" placeholder="Minute(xx)" pattern="[0-9]{2}" title="Minute (xx)"></input><br>
			Select the action : <select id="set_schedule" required name="light_control">
			<option  value="0">OFF</option> <?php#it is false will turn off?>
			<option  value="1">ON</option>	<?php #it is true will turn on?>
			</select> <br>
			Enter a description: <input id="set_schedule" required type="text" name="description" placeholder="Description"></input>
			<br>
			<input id="set_schedule" type="Submit"></input>
			</form>
		</div>

	</body>
</html>
