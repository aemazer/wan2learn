
<!DOCTYPE html>

<html>
	<head>
		<title>Wan2Learn login</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>
	
		<header id="head" >
		 <p>Wan2Learn User Login</p>
		 <p><a href="Wan2LearnHomepage.html"><span id="Home">Home</span></a></p>
		</header>
		
		<div id="main-wrapper">
		 <div id="login-wrapper">
			 <form name="form1" method="post" action="checklogin">
				 <ul>
					 <li>
						 <label for="username">Username : </label>
						 <input type="text" maxlength="30" required autofocus name="username" id="username" />
					 </li>
					
					 <li>
						 <label for="password">Password : </label>
						 <input type="password" maxlength="30" required name="password" id="password"/>
					 </li>
					 <li class="buttons">
						 <input type="submit" name="Submit" value="Log me in" />
							<input type="button" name="register" value="Register" onclick="location.href='register.php'" />
					 </li>
					
				 </ul>
			 </form>
				
			</div>
		</div>
	
	</body>
</html>