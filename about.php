<!DOCTYPE HTML>
<head>
	<title>About Wan2Learn</title>
	<link rel="stylesheet" type="text/css" href="wan2learnstyle.css" />
	<?php 
		require 'common.php';
	?>
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
			showAboutPage();
		?>
</div>


</body>