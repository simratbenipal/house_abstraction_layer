
<?php
//get the brightness level from submissiion
$ip="";
$ip=$_GET['ip'];
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Philips Bridge | HAL </title>
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
			<p id="connect_philips">This page is used to connect to the Philips Bridge in your network.</p>
			<form id ="connect_philips" action = "connect_philips.php" method = "get">
			Network IP of your network: 192.168.xxx.0/24<br>
			Select the value of xxx:<input  id= "connect_philips" type="number" name="ip" min="0" max ="255" required ></input>
			<input id="connect_philips" type="submit" value="Submit"></input>
			</form>
			</form>
			<p style="font-size:25px; font-family: 'Grenze', serif; color:#000; font-weight:bolder;">Please press the link button on Philips Bridge before pressing submit button</p>
			<p style="font-size:25px; font-family: 'Grenze', serif; color:#000; font-weight:bolder;">If not sure, please <a href="../mainHAL_PAGE.php" href="index.php">Go to Home page</a></p>
			
			
			<?php
				if (isset($ip))
					{
			
						//now we have to write this to external file
						$ip_file = fopen("/var/www/html/include/philips_hue/network_ip.txt", "w") or die("Unable to open file!");
						fwrite($ip_file, $ip);
						fclose($ip_file);
						#now the subnet network IP has been written to the file
						#now we can do the nmap scan of the network
						#to do so we can run the scan_for_bridge.py script 
						#give it the network IP
						$command = escapeshellcmd('python3 /var/www/html/include/philips_hue/scan_for_bridge.py');
						$output = shell_exec($command);
						echo "<pre>$output</pre>";
					}
			?>

	</body>
</html>
