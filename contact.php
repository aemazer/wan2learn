<!DOCTYPE HTML>
<head>
  <title>Contact</title>
	<link rel="stylesheet" type="text/css" href="wan2learnstyle.css" />
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
		showContactPage();
	?>
</body>