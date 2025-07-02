
<?php
//get the brightness level from submissiion
$bright=$_GET['bright'];
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Brightness | HAL </title>
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
			<p id="brightness" >Brightness of the light has been changed!!<br></p>
			<?php
			//now we have to write this to external file
			$bright_file = fopen("/var/www/html/include/philips_hue/bright_specified.txt", "w") or die("Unable to open file!");
			fwrite($bright_file, $bright);
			fclose($bright_file);
			
			//execute the command to change the brightness of the light
			$command = escapeshellcmd('python3 /var/www/html/include/philips_hue/bright_1.py');
			$output = shell_exec($command);
			echo "<pre>$output</pre>";
			?>
	</body>
</html>
