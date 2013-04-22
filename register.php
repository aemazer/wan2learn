<?php session_start();?>
<!DOCTYPE html> 
<html>
	<head> 
		<title>Wan2Learn Register</title>
	    <link rel="stylesheet" type="text/css" href="style.css" /> 
	    <?php 
			require 'common.php';
		?>
	</head> 
		
	<body> 

	    <header id="head" > 
	    	<p>Wan2Learn User Registration</p> 
	    	<p><a href="homepage.php"><span id="homepage">Homepage</span></a></p>
	    </header> 
	   
	   	<div id="main-wrapper"> 
	   		<div id="register-wrapper">

	   			<?php 
		   			if(!empty($_POST['register'])) {
		   				registerUser();
		   			}
		   			showRegistrationForm($_SERVER['PHP_SELF']);
	   			?>
	   		</div>
	   	</div>

	</body> 
</html>