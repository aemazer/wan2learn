<?php session_start();?>
<!DOCTYPE HTML>
<head>
	<link rel="stylesheet" type="text/css" href="wan2learnstyle.css" />
	<?php 
		require 'config.php';
		require 'common.php';
	?>
	<title> Welcome to Wan2Learn! Teach Anything. Learn Anything. </title>
</head>
<body>
	<div id = "wrapper">
		<?php
		   	if(!empty($_POST['signIn'])){
				checkLogin();
				showHeaderLoggedIn($_SESSION['username']);
			}
			else{
				showHeader();
			}
	   		
			showMainPage();
		?>
	</div>
</body>