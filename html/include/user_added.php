<!--his page is just a combined version of html and php -->
<?php 
	$db_server="localhost";
	$db_user = "capstone";
	$db_pass="";
	$db_name="capstone";
	$conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
	
	if(mysqli_connect_errno())
	{
		echo"Connection failed: ";
		mysqli_connect_error();
		exit();
	}
	else
		echo"Connection to Database is Successfull<br>";

$hashed_message = "";
$new_username = $_POST['new_username'];
$new_password = $_POST['new_password'];
$query2= "INSERT INTO users (username,password) VALUES ( \"$new_username\" , \"$new_password\")"; 
		$result_hashed = mysqli_query($conn,$query2);
		if($result_hashed)
			$hashed_message="User has been added successfully!!";

//close the connection
mysqli_close($conn);
	
	
?>
<!DOCTYPE html>
<html>

	<head>
		<title>User Added | HAL </title>
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
		<link rel="stylesheet" media="screen" type="text/css" href="./style.css">
	</head>
	
	<body>
		<div id="wrapper">
			<h1>House Abstraction Layer</h1>
			<h2>Welcome to  <abbr title="House Abstraction Layer">HAL</abbr> </h2>
			<hr style="border: 10px solid green;  border-radius: 5px;" ><br>
<p>Existing User <a id="brightness_link" style="text-align:center" href=./../WI_HAL_LOGIN_V1.php >Login</a> </p>
					
			<?php echo "<p>" . $hashed_message . "</p>"; ?>
		</div>
	</body>
	
</html>
