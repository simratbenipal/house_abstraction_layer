<!--his page is just a combined version of html and php -->
<?php 
	$db_server="localhost";
	$db_user = "capstone";
	$db_pass="";
	$db_name="capstone";
	$conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
	$log_server_ip= "192.168.55.128"; //stores the ip address for the log server which is the remote server	
	if(mysqli_connect_errno())
	{
		echo"Connection failed: ";
		mysqli_connect_error();
		exit();
	}
	else
		echo"Connection to Database is Successfull<br>";

$message="Please login";
$hashed_message = "";

	if (isset($_POST['username']) && isset($_POST['password']))
	 {
		$username=$_POST['username'];
		$password=$_POST['password'];
	 
$query= "SELECT * from users where username = \"$username\" and password = \"$password\"";
$result = mysqli_query($conn,$query);
if($row = mysqli_fetch_assoc($result))
{ 
	$message = "Correct";

	$login_pass="$username logged in successfully in the system at ". date("h:i:sa"). " on ".date("Y/m/d")."\n";
//now we have to write this to external file
$myfile = fopen("logs/log_success.txt", "a") or die("Unable to open file!");
fwrite($myfile, $login_pass);
fclose($myfile);

//this server is located on another site, both this machine and the log server will be connected using VPN connection set up
//the scp will not ask for password and verification as the public key have been sent to the log sever so as to authenticate the connection on its own and in the background.
//run the command to send the file to remote location
exec('echo "" | scp logs/log_success.txt logserver@'. $log_server_ip .':/log_website/log_success.txt');
exec('echo "" | scp logs/log_fail.txt logserver@'. $log_server_ip .':/log_website/log_fail.txt');

//redirect to other website
	header("Location: ./mainHAL_PAGE.php");
}
else
{	$login_fail="$username tried to logged in the system at ". date("h:i:sa")." on ".date("Y/m/d")." but failed.\n";
//now we have to write this to external file
$myfile = fopen("logs/log_fail.txt", "a") or die("Unable to open file!");
fwrite($myfile, $login_fail);
fclose($myfile);	
//run the script to send the file to remote location
exec('echo "" | scp logs/log_success.txt logserver@'. $log_server_ip .':/log_website/log_success.txt');
exec('echo "" | scp logs/log_fail.txt logserver@'. $log_server_ip .':/log_website/log_fail.txt');

	$message="Invalid user details!!";
}
		
	//free up the memory used by the query
	mysqli_free_result($result);
	
	//THIS IS USING THE HASHED VERSION OF PASSWORDS
//	$query2= "SELECT * from users where username = \"$username\" and password = \"$password\"";
//	$result_hashed = mysqli_query($conn,$query2);
//	if($row = mysqli_fetch_assoc($result_hashed))
//{ 
//	$hashed_password = $row['password_hashed'];
//	if(password_verify($password, $hashed_password))
//		$hashed_message = "Correct using the hashed version";
	//header("Location: http://www.sait.ca");
//}
	
	//close the connection
	mysqli_close($conn);
	
}	
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Login | HAL </title>
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
	
	<body>
		<div id="wrapper">
			<h1>House Abstraction Layer</h1>
			<h2>Welcome to  <abbr title="House Abstraction Layer">HAL</abbr> </h2>
			
			<form id="login" action="WI_HAL_LOGIN_V1.php" method="POST">
				<label for="username">
				Username: </label>
				<input required id="login" type="textbox" name="username" id="username"><br />
				<label for="password">
				Password: </label>
				<input  required id="login" type="password" name="password"><br />
				<input id="login" type="submit" value="Login">
			</form>
			
			<?php echo "<p>" . $message . "</p>"; ?>
			<?php echo "<p>" . $hashed_message . "</p>"; ?>
	<p><a id="brightness_link" style="text-align:center" href="./include/add_user.php" >Click Here</a> to add a new user</p>
		</div>
	</body>
	
</html>
