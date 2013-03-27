<?php
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
?>