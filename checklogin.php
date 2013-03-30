<?php

require 'config.php';
require 'homepage.php';

// username and password sent from form
	$username=$_POST['username'];
	$password=$_POST['password'];


//To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * 
FROM users 
WHERE users.username='" . $username . "' AND users.password='" . $password . "'";

$result=mysql_query($sql);

// Mysql_num_row is counting table row
$returnMe = (mysql_num_rows($result) == 1);


// If result matched $myusername and $password, table row must be 1 row

if($returnMe){
	// Register $myusername, $password and redirect to file "admin page"
	session_register("username");
	session_register("password");
	echo "Welcome, " . $username;
}
else {
	echo "Wrong Username or Password";
}
