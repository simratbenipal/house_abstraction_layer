<!DOCTYPE html>
<!--TheFreeElectron 2015, http://www.instructables.com/member/TheFreeElectron/ -->

<html>
    <head>
		<meta charset="utf-8" />
		<title>HAL</title>
		<link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Telex&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Gochi+Hand&display=swap" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Capriola&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Wallpoet&display=swap" rel="stylesheet">	
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Indie+Flower|Trade+Winds&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lacquer&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Grenze:ital,wght@0,100;1,200&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Hind:wght@500&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,500&display=swap" rel="stylesheet">
		<link rel="stylesheet" media="screen" type="text/css" href="include/style.css">
    </head>
 
    <body id="index">
		<div id="wrapper">
			<h1>House Abstraction Layer</h1>
			<h2>Welcome to  <abbr title="House Abstraction Layer">HAL</abbr> </h2>
			<p id="mainHAL">From here you can control all your <abbr title="Internet of Things">IoT</abbr> devices.</p>
			<hr style="border: 10px solid green;  border-radius: 5px;" >
			<p id="mainHAL" style="color:#000;">Click on the image to control the two smart lights</p>
				
			   <!-- On/Off button's picture 
			   this part is taken from online resources
			   <!--TheFreeElectron 2015, https://www.instructables.com/id/Simple-and-intuitive-web-interface-for-your-Raspbe/#discuss  -->

			<?php
			//just gonna control two pin
			$val_array = array(0,0);
			
			//this php script generate the first page in function of the file
			for ( $i= 0; $i<2; $i++) {
				//set the pin's mode to output and read them
				system("gpio mode ".$i." out");
				exec ("gpio read ".$i, $val_array[$i], $return );
			}
			//for loop to read the value
			
			for ($i = 0; $i < 2; $i++) {
				//if off
				$val_array[$i][0] =""; ////check this line in raspberry PI
				if ($val_array[$i][0] == 0 ) {
					echo ("<img id='button_".$i."' src='data/img/red/red_".$i.".jpg' onclick='change_pin (".$i.");'/>");
				}
				//if on
				if ($val_array[$i][0] == 1 ) {
					echo ("<img id='button_".$i."' src='data/img/green/green_".$i.".jpg' onclick='change_pin (".$i.");'/>");
				}	 
			}
		?>

<hr style="border: 1px dashed blue;  border-radius: 5px;" >

		<p id="time">Set a defined time when to turn off the lights</p>
		<p id ="time_2">At what time do you want to you want to turn off the light<br>(0-23) 0--> 12:00AM 23 -->11:00PM</p>
		<form id="time" action="include/light.php" method="get">
			<select  id ="time" name="time">
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
		
		<hr style="border: 10px solid green;  border-radius: 5px;" >
		<p >StelPro Thermostat</p>
		<?php
		 include 'include/thermostat.php';
		?>
		<hr style="border: 10px solid green;  border-radius: 5px;" >
		<p >Philips Hue</p>
		<?php
		 include 'include/hue.php';
		?>
		</div>
		
			<!-- javascript -->
			<script src="script.js"></script>

    </body>
</html>
