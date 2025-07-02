<html>
    <head>
        <meta charset="utf-8" />
        <title>Filter | HAL </title>
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
		<div id="wrapper"><br>
			<h1>House Abstraction Layer</h1>
			<h2>HAL</h2>
			<hr style="border: 10px solid green;  border-radius: 5px;" ><br>
			<a id="brightness_link" href="../mainHAL_PAGE.php" >Home page</a><br><br><br><br>
			<p id="brightness" >Filters changed today<br></p>
			<?php
				echo "<p>Today is ";
				echo date("F j, o");
				echo "<br>This date has been recorded</p>";
		
				#July 19, 2020 2:00 PM
				$date=date("F j, o") . " 12:00 PM";
				#echo $date;
			//now we have to write this to external file
			$filter_file = fopen("/var/www/html/include/date_filter_change.txt", "w") or die("Unable to open file!");
			fwrite($filter_file, $date);
			fclose($$filter_file);
			
			?>

	</body>
</html>
