<?php 
session_start();

	include("connection.php");
	include("functions.php");


	// check if user has clicked on submit button
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		// collect username, email and password
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// check if collected user inputs contain data
		if(!empty($user_name) && !empty($email) && !empty($password) && !is_numeric($user_name))
		{

			// save to database if collected user inputs contain data
			$user_id = random_num(20);
			$query = "insert into user (user_id,user_name, email, password) values ('$user_id','$user_name','$email','$password')";

			// execute or save query
			mysqli_query($con, $query);

			// after user signed up, redirect him immediately to login page
			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name" placeholder="username"><br><br>
			<input id="text" type="email" name="email" placeholder="email"><br><br>
			<input id="text" type="password" name="password" placeholder="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>