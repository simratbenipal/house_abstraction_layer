
<?php
//get the time from submissiion
$time=$_GET['time'];
?>

<html>
    <head>
        <meta charset="utf-8" />
		<title>Time | HAL</title>
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
		<link rel="stylesheet" media="screen" type="text/css" href="include/style.css">
		<link rel="stylesheet" media="screen" type="text/css" href="style.css">
   
    </head>
 
    <body id="light">
		<div id="wrapper">

			<h1>House Abstraction Layer</h1>
			<h2>HAL</h2>
			<hr style="border: 10px solid green;  border-radius: 5px;" ><br>
			<a href="../mainHAL_PAGE.php" href="index.php">Go to Home page</a>
			<p>So at <?php echo "$time"?> the light will turn off.</p>
			<br>
			<?php
			//now we have to write this to external file
			$time_file = fopen("/var/www/html/include/time_specified.txt", "w") or die("Unable to open file!");
			fwrite($time_file, $time);
			fclose($time_file);

			$command = escapeshellcmd('python3 /var/www/html/include/time_script.py');
			$output = shell_exec($command);
			echo "<pre>$output</pre>";
			?>
		</div>
	</body>
</html>
