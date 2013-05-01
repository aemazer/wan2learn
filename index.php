<?php session_start();?>
<!DOCTYPE HTML>
<head>
	<link rel="stylesheet" type="text/css" href="wan2learnstyle.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src = "bootstrap/js/bootstrap.js"></script>
	<script src = "script.js"></script>
	<script src = "chosen/chosen/chosen.jquery.js"></script>
	<?php 
		require 'config.php';
		require 'common.php';
	?>
	<title> Welcome to MettaLearn! Teach Anything. Learn Anything. </title>
</head>
<body>
	<div id = "wrapper">
		<table>
			<tr>
		<?php
		   	if((!empty($_POST['signIn']))){
				checkLogin();
				if(isset($_SESSION['username'])){
				showHeaderLoggedIn($_SESSION['username']);
				}
				else{
					showHeader();
				}
			}
			else if(isset($_SESSION['username'])){
				showHeaderLoggedIn($_SESSION['username']);
			}
			else{
				showHeader();
			}
			if(!empty($_POST['logout'])){
				unset($_SESSION['username']);
				header('Location: index.php');
			}
			echo '</tr>
			<tr>';
			showMainPage();
		?>
		</tr>
</table>
	</div>
</body>