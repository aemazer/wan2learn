<?php
<<<<<<< HEAD

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

=======
	require 'config.php';
	require 'register.php';

	// info sent from form
	$username=$_POST['username'];
	$password=$_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];

	if(isset($_POST['username'])&&isset($_POST['password']))
	{
		$query = "SELECT *
		FROM users
		WHERE users.firstname='" . $firstname . "' AND users.lastname='" . $lastname . "'";

		$result = mysql_query($query, $dblink)
		or die("Query failed");
	
		$returnMe = (mysql_num_rows($result) == 1);

		if($returnMe){
			echo 'User is already registered';
		}
		else{
			if(isset($_POST['username'])){
							$query = "SELECT *
				FROM users
				WHERE users.username='" . $username . "'";

				$result = mysql_query($query, $dblink)
					or die("Query failed");
				$returnMe = (mysql_num_rows($result) == 1);


				if($returnMe){
					echo 'Username is taken.';
				}
				else{
					mysql_query("INSERT INTO users(username, password, firstname, lastname) VALUES ('$username','$password','$firstname','$lastname')") or die(mysql_error());

					echo "User is now registered!";
				}
		}
	}
	}
	
	/*if(checkRegister($firstname, $lastname)){
		//$errorText .= '<li> Username has already been taken. </li>';
		//$ErrorFields[]='username';
		echo 'username is taken';
//		echo'<input type="button" name="cancel" value="Cancel" onclick="location.href='homepage.php'" />';

	}
	else
	{
		mysql_query("INSERT INTO users(username, password, firstname, lastname) VALUES ('$username','$password','$firstname','$lastname')") or die(mysql_error());

		echo "User is now registered!";
	}
	/*else{
		echo '<h2>There are problems. Fix them.</h2>';

		echo '<input type="button" name="cancel" value="Back" onclick="location.href='homepage.php'" />'; 
	}
*/
>>>>>>> Registration Works
?>