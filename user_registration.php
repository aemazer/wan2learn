<?php

$dbhost = 'localhost';
$dbuser = 'faul9383';
$dbpassword = '$TR@t3gic1';
$dbdatabase = 'faul9383';
$tbl_name="registration"; // Table name

// Connecting, selecting database
$dblink = mysql_connect($dbhost, $dbuser, $dbpassword)
    or die("Could not connect to database at $dbhost");

mysql_select_db($dbdatabase,$dblink)
    or die("Could not select database $dbdatabase " . mysql_error());

// info sent from form
$username=$_POST['username'];
$password=$_POST['password'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];


//To protect MySQL injection (more detail about MySQL injection)
//$courseId = stripslashes($courseId);
//$studentId = stripslashes($studentId);
//$grade = stripslashes($grade);
//$courseId = mysql_real_escape_string($courseId);
//$studentId = mysql_real_escape_string($studentId);
//$grade = mysql_real_escape_string($grade);


mysql_query("INSERT INTO users(username, password, firstname, lastname) VALUES ('$username','$password','$firstname','$lastname')") or die(mysql_error());

echo "User is now registered!";

?>