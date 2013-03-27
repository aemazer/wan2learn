
<!DOCTYPE html> 
<<<<<<< HEAD
<html> 
	   	<head> 
	   		  <title>Wan2Learn Register</title> 
			  <link rel="stylesheet" type="text/css" href="style.css" /> 
=======
<html>
	<head> 
		<php? echo' <title>Wan2Learn Register</title> '?>
	    <link rel="stylesheet" type="text/css" href="style.css" /> 
>>>>>>> Registration Works
	</head> 
		
	<body> 

<<<<<<< HEAD

	   <header id="head" > 
	   <p>Wan2Learn User Registration</p> 
	   <p><a href="Wan2LearnHomepage.html"><span id="homepage">Homepage</span></a></p>
	   </header> 
	   
	   <div id="main-wrapper"> 
	    <div id="register-wrapper"> 
		 <form name="form2" method="post" action="user_registration">
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
		<label for="passwd">Password : </label> <input type="password" id="password" maxlength="30" required name="password" /> 
					
	</li> 
					
	<li> 
					
		<label for="conpasswd">Confirm Password : </label> 
		<input type="password" id="conpasswd" maxlength="30" required name="conpassword" />
					
	</li> 
					
		<li class="buttons"> <input type="submit" name="register" value="Register" /> 
		<input type="button" name="cancel" value="Cancel" onclick="location.href='login.php'" /> 
					
	</li> 
=======
	    <header id="head" > 
	    	<p>Wan2Learn User Registration</p> 
	    	<p><a href="Wan2LearnHomepage.html"><span id="homepage">Homepage</span></a></p>
	    </header> 
	   
	   	<div id="main-wrapper"> 
		    <div id="register-wrapper"> 
				<form name="form2" method="post" action="user_registration">
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
										
							<li class="buttons"> <input type="submit" name="register" value="Register" /> 
							<input type="button" name="cancel" value="Cancel" onclick="location.href='homepage.php'" /> 
										
						</li> 
>>>>>>> Registration Works
					</ul> 
				</form> 
			</div> 
		</div> 
	</body> 
</html>