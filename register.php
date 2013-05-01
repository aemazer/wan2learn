<?php session_start();?>
<!DOCTYPE html> 
<html>
	<head> 
		<title>MettaLearn Register</title>
	    <link rel="stylesheet" type="text/css" href="style.css" /> 
	    <?php 
			require 'common.php';
		?>
	</head> 
		
	<body> 
	   	<div id="wrapper"> 
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