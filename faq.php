<!DOCTYPE HTML>
<head>
  <title>FAQ</title>
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
			showFAQPage();
		?>
	</div>
</body>