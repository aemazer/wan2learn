<!DOCTYPE HTML>
<head>
	<link rel="stylesheet" type="text/css" href="wan2learnstyle.css" />
	<?php 
		require 'config.php';
	?>
	<title> Welcome to Wan2Learn! Teach Anything. Learn Anything. </title>
</head>

<body>
	<div id = "wrapper">
		<div id = "logoDiv"><img src="images/wan2learnlogoNew.png"></div>
		<div id = "linksDiv">
			<p class="links">|<a href="dummypage.html">Contact</a>|<a href="dummypage.html">Help</a>|<a href="dummypage.html">Cancellations</a>|<a href="dummypage.html">FAQs</a>|<a href="dummypage.html">About</a>|<a href="register.php">Register</a>|</p>
		</div>
<!--A table has been created to be able to position divs and images side by side-->	
<table id="table">
	<th colspan = "3"><a id="topText">I want to learn from someone who is...</a></th>
	<tr>
		<td>
			<a href="dummypage.html"><div id="localDiv">
				<img src="images/whiteHouseT.png">
				<a class="largeText">Local</a>
			</div></a>
			<br />
		</td>
		<td >
			<div class="blankDiv"></div>
		</td>
		<td >
			<a href="dummypage.html"><div id="globalDiv">
				<img src="images/globe.png">
				<a class="largeText">Global</a>
			</div></a>
			<br />
		</td>
	</tr>
	<tr>
		<td>
			<br />
			<div id="loginbox">
			 	<form name="form1" method="post" action="checklogin">
					<label for="signin" class="label">Sign in!</label> <br />
					<a class="text">Username: </a><input type = "textarea" id="username" />
					<br />
					<br />
					<a class="text">Password: </a><input type = "textarea" id ="password" />
					<input type="submit" value="Sign me in!" id="signinbutton" />
					<br />
					<br />
				</form>
			</div>
		</td>
		<td >
			<div class="blankDiv"></div>
		</td>
		<td>
			<br />
			<div id="searchbox">
				<label for="bluesearch" class="label">I want to learn...</label>
				<br />
				<input type = "textarea" name = "search" value = "Search" id="bluesearch" />
				<input type = "submit" value = ">>Teach Me!" id="bluesearchsubmit" />
				<br />
				<label for="teachbutton" class="label">I want to teach...</label>
				<br />
				<input type = "button" value = "Let's Begin!" id="teachbutton">
			</div>
		</td>
	</tr>
</table>
</div>
</body>