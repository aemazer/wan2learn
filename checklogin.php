<?php

<<<<<<< HEAD
$dbhost = 'localhost';
$dbuser = 'faul9383';
$dbpassword = '$TR@t3gic1';
$dbdatabase = 'faul9383';
$tbl_name="users"; // Table name

// Connecting, selecting database
$dblink = mysql_connect($dbhost, $dbuser, $dbpassword)
    or die("Could not connect to database at $dbhost");

mysql_select_db($dbdatabase,$dblink)
    or die("Could not select database $dbdatabase " . mysql_error());
=======
require 'config.php';
require 'homepage.php';
>>>>>>> Registration Works

// username and password sent from form
$username=$_POST['username'];
$password=$_POST['password'];


// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

<<<<<<< HEAD
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
=======
$sql="SELECT * 
FROM users 
WHERE users.username='" . $username . "' AND users.password='" . $password . "'";

>>>>>>> Registration Works
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $password, table row must be 1 row

if($count==1){
<<<<<<< HEAD

// Register $myusername, $password and redirect to file "admin page"
session_register("username");
session_register("password");
header("location:http://mlc104.csumb.edu/classes/faulknertraviss/wan2learn/test.php");
}
else {
echo "Wrong Username or Password";
=======
	// Register $myusername, $password and redirect to file "admin page"
	session_register("username");
	session_register("password");
}
else {
	echo "Wrong Username or Password";
>>>>>>> Registration Works
}
?>