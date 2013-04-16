<!DOCTYPE HTML>
<head>
  <title>Cancellations</title>
	<link rel="stylesheet" type="text/css" href="wan2learnstyle.css" />
	<?php require 'common.php';?>
</head>

<body>
	<div id="wrapper">
		<?php
			if(session_is_registered($username)){
				showHeaderLoggedIn();
			}
			else{
				showHeader();
			}
			showCancellationsPage();
		?>
	</div>
</body>