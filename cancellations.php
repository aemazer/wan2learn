<?php session_start();?>
<!DOCTYPE HTML>
<head>
  <title>Cancellations</title>
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
			showCancellationsPage();
		?>
	</div>
</body>