<?php
function registerUser(){
	require 'config.php';
	//info sent from form
	$username=$_POST['username'];
	$password=$_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];

	if(isset($_POST['firstname'])&&isset($_POST['lastname']))
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
}
function showRegistrationForm($server){
	echo'
		<form action = "' . $server . '" method = "post">
			<ul> 
				<li> 
					<label for="firstname">First Name : </label> 
					<input type="text" id="firstname" maxlength="30" required autofocus name="firstname" /> 
				</li> 
				<li> 
					<label for="lastname">Last Name : </label> 
					<input type="text" id="lastname" maxlength="30" required autofocus name="lastname" /> 
				</li> 
				<li> 
					<label for="username">Username : </label> 
					<input type="text" id="username" maxlength="30" required autofocus name="username" /> 
				</li> 
							
				<li> 
					<label for="passwd">Password : </label> 
					<input type="password" id="password" maxlength="30" required name="password" /> 
								
				</li> 
								
				<li> 
								
					<label for="conpasswd">Confirm Password : </label> 
					<input type="password" id="conpasswd" maxlength="30" required name="conpassword" />
								
				</li> 
								
					<li class="buttons"> <input type="submit" id = "submit" name="register" value="Register" /> 
					<input type="button" name="cancel" value="Cancel" onclick="location.href=\'homepage.php\'" /> 
								
				</li> 
			</ul> 
		</form> ';
}
?>