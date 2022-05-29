<?php 
session_start();

	include("connection.php");
	include("functions.php");

	// redirect to signup page if the user is not logged in
	$user_data = check_login($con);
	// echo var_export($user_data, true);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login system</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $user_data['user_name']; ?>
</body>
</html>