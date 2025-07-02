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

$hashed_message = "Please Enter the secret passphrase to add new user";
$form =false;
$secret=true;

	if (isset($_POST['secretkey']) )
	 {
		$secret=$_POST['secretkey'];
		$query2= "SELECT * from secret ";
		$result_hashed = mysqli_query($conn,$query2);
		if($row = mysqli_fetch_assoc($result_hashed))
		{
			$secret_hashed = $row['secret_hashed'];
			if(password_verify($secret, $secret_hashed))
			{
				$hashed_message= "Secret passphrase is correct<br>Please Enter the following details";
				$form = true;
				$secret=false;
				//so if the secret passhphrase is found in the table then set the boolean to be true
			
			
			}
			else 
				$hashed_message="Invalid Secret Passphrase!! Try again!!";		
		}

	}

	
	
	
	
//free up the memory used by the query
//mysqli_free_result($result_hashed);
//close the connection
mysqli_close($conn);
	
	
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Add User | HAL </title>
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
			<form id="login" action="add_user.php" method="POST">
				<label for="login">
				Secret passphrase: </label>
				<input required id="login" type="password" name="secretkey" id="sercetkey"><br />
				
				<input id="login" type="submit" value="Login">
			</form>
			
			
			<?php echo "<p>" . $hashed_message . "</p>"; ?>
<?php
if($form)
	{
		echo "<form id=\"login\" action=\"user_added.php\" method=\"POST\">
				<label for=\"username\">
				Enter new username: </label>
				<input required id=\"login\" type=\"textbox\" name=\"new_username\" id=\"username\"><br />
				<label for=\"password\">
				Enter new password: </label>
				<input  required id=\"login\" type=\"password\" name=\"new_password\"><br />
				<input id=\"login\" type=\"submit\" value=\"Add User\">
			</form>
			";
	}
?>
		</div>
	</body>
	
</html>
