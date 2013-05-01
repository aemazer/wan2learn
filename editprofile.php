<?php session_start();?>
<!DOCTYPE HTML>
<head>
  <title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="wan2learnstyle.css" />
	<?php require 'common.php';?>
</head>

<body>
	<div id="wrapper">
		<?php
			if(isset($_SESSION['username'])){
				showHeaderLoggedIn($_SESSION['username']);
			}
			else{
				showHeader();
			}
			editProfile($_SESSION['username']);
			if(isset($_POST['editProfile'])){
				runEditQuery($_SESSION['username']);
			}
		?>
	</div>
</body>