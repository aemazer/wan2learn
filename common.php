<?php 
function showHeader(){
	echo '
		<div id = "logoDiv"><img src="images/wan2learnlogoNew.png"></div>
		<div id = "linksDiv">
			<p class="links">|<a href="contact.php">Contact</a>|<a href="help.php">Help</a>|<a href="cancellations.php">Cancellations</a>|<a href="faq.php">FAQs</a>|<a href="about.php">About</a>|<a href="register.php">Register</a>|</p>
		</div>';
}
function showMainPage(){

	echo'

	<!--A table has been created to be able to position divs and images side by side-->	
	<div id = "tableDiv"><!--this div is for the benifit of IE only. -->
	<table id="table">
		<tr>
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
					<input type = "button" value = "Let\'s Begin!" id="teachbutton">
				</div>
			</td>
			<td >
				<div class="blankDiv"></div>
			</td>
			<td>
				<br />
				<div id="loginbox">';

					if(!isset($_POST['signIn'])){
						showSignInForm();
					}
					else{
						showUserInfo();
					}
			echo'
						
				</div>
			</td>
		</tr>
		<th colspan = "3"><a id="topText">I want to learn from someone who is...</a></th>
		<tr>
			<td>
				<!--[if IE]>
				<div id="localDiv">
					<img src="images/whiteHouseT.png">
					<a class="largeText">Local</a>
				</div>
				<![endif]-->
				<!--[if !IE]>-->
				<a href="dummypage.html"><div id="localDiv">
					<img src="images/whiteHouseT.png">
					<a class="largeText">Local</a>
				</div></a>
				<!--<![endif]-->
				<br />
			</td>
			<td >
				<div class="blankDiv"></div>
			</td>
			<td >
				<!--[if IE]>
				<div id="globalDiv">
					<img src="images/globe.png">
					<a class="largeText">Global</a>
				</div>
				<![endif]-->
				<!--[if !IE]>-->
				<a href="dummypage.html"><div id="globalDiv">
					<img src="images/globe.png">
					<a class="largeText">Global</a>
				</div></a>
				<!--<![endif]-->
				<br />
			</td>
		</tr>
	</table>
	</div>';
}
function showSignInForm(){
	echo'	
		<form action = "' . $_SERVER['PHP_SELF'] . '" method = "post">
			<label for="signin" class="label">Sign in!</label> <br />
			<a class="text">Username: </a>
			<input type="text" maxlength="30" required autofocus name="username" id="username" />
			<br />
			<a class="text">Password: </a>
			<input type="password" maxlength="30" required name="password" id="password"/>
			<input type="submit" value="Sign me in!" name="signIn" id = "signinbutton"/>
			<br />
			<a class ="text">Not registered? Sign up <a href="register.php">here</a>!</a>
		</form>';
}
function showUserInfo(){
	echo '
		<a class = "label">Welcome Back!</a>
		<p class = "text"><a href="dummypage.html">Edit Profile</a></p>
	';
}
function showHeaderLoggedIn(){

	$username=$_POST['username'];
	echo '
		<div id = "logoDiv"><img src="images/wan2learnlogoNew.png"></div>
		<div id = "linksDiv">
			<p class="links">|<a href="dummypage.html">Contact</a>|<a href="dummypage.html">Help</a>|<a href="dummypage.html">Cancellations</a>|<a href="dummypage.html">FAQs</a>|<a href="dummypage.html">About</a>|Welcome, <a href="dummypage.html">' . $username . '</a>|</p>
		</div>';
}
function showRegistrationForm($server){
	echo'
		<form action = "' . $server . '" method = "post">
			<ul> 
				<li> 
					<label for="firstname">First Name : </label> 
					<input type="text" id="firstname" maxlength="30" required autofocus name="firstname" /> 
				</li> 
				<li> 
					<label for="lastname">Last Name : </label> 
					<input type="text" id="lastname" maxlength="30" required autofocus name="lastname" /> 
				</li> 
				<li> 
					<label for="e-mail">E-Mail Address: </label> 
					<input type="text" id="email" maxlength="50" required autofocus name="email" /> 
				</li>
				<li> 
					<label for="username">Username : </label> 
					<input type="text" id="username" maxlength="30" required autofocus name="username" /> 
				</li> 
							
				<li> 
					<label for="passwd">Password : </label> 
					<input type="password" id="password" maxlength="30" required name="password" /> 
								
				</li> 
								
				<li> 
								
					<label for="conpasswd">Confirm Password : </label> 
					<input type="password" id="conpasswd" maxlength="30" required name="conpassword" />
								
				</li> 
								
					<li class="buttons"> <input type="submit" id = "submit" name="register" value="Register" /> 
					<input type="button" name="cancel" value="Cancel" onclick="location.href=\'homepage.php\'" /> 
								
				</li> 
			</ul> 
		</form> ';
}
function registerUser(){
	require 'config.php';
	//info sent from form
	$email = $_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];

	if(isset($_POST['firstname'])&&isset($_POST['lastname']))
	{
		$query = "SELECT *
		FROM users
		WHERE users.firstname='" . $firstname . "' AND users.lastname='" . $lastname . "'";

		$result = mysql_query($query, $dblink)
		or die("Query failed");
	
		$returnMe = (mysql_num_rows($result) == 1);

		if($returnMe){
			echo 'User is already registered';
		}
		else{
			if(isset($_POST['username'])){
				$query = "SELECT *
				FROM users
				WHERE users.username='" . $username . "'";

				$result = mysql_query($query, $dblink)
					or die("Query failed");
				$returnMe = (mysql_num_rows($result) == 1);


				if($returnMe){
					echo 'Username is taken.';
				}
				else{
					if(isset($_POST['email'])){
						$query = "SELECT *
						FROM users
						WHERE users.username='" . $email . "'";

						$result = mysql_query($query, $dblink)
							or die("Query failed");
						$returnMe = (mysql_num_rows($result) == 1);


						if($returnMe){
							echo 'E-mail address is already in use.';
						}
						else{
							mysql_query("INSERT INTO users(email, username, password, firstname, lastname) VALUES ('$email', $username','$password','$firstname','$lastname')") or die(mysql_error());

							
							echo "User is now registered!";

						}
					}	
					
				}
			}
		}
	}
}
function sendEmail($email){
		echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        mail($email,'Welcome to Wan2Learn',
					        "Thank you for joining Wan2Learn" . print_r($_POST,true),
					        'From: amazer@csumb.edu');
					        exit();
        
        //echo "<h2>Form received and emailed. Thank you!</h2>";
}
function checkLogin(){
	// username and password sent from form
		$username=$_POST['username'];
		$password=$_POST['password'];


	//To protect MySQL injection (more detail about MySQL injection)
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	$sql="SELECT * 
	FROM users 
	WHERE users.username='" . $username . "' AND users.password='" . $password . "'";

	$result=mysql_query($sql);

	// Mysql_num_row is counting table row
	$returnMe = (mysql_num_rows($result) == 1);


	// If result matched $myusername and $password, table row must be 1 row

	if($returnMe){
		// Register $myusername, $password and redirect to file "admin page"
		session_register("username");
		session_register("password");
	}
	else {
		echo "Wrong Username or Password";
	}
}
function showAboutPage(){
		echo'
		<table>
			<tr>
				<td>
					<div id="RickB">
						<img src="/images/blankprofile.jpg" />
					</div>
				</td>
				<td>
					<div id="aboutdiv">
						<p class = "text"> Wan2Learn is a website dedicated to connecting teachers with students. Any one with a skill or talent who wants to share it can create a Teacher profile and offer their talents to prospective students.\nWan2Learn is all about making that connection between the teacher and student. We know it can be hard sometimes to find the right teacher, but not any more! Wan2Learn makes it easy to browse through the different subjects being taught and to make an appointment with a teacher!</p>
					</div>
				</td>
			</tr>
		</table>
		';
}
function showCancellationsPage(){
	echo '
		<div id="cancelDiv">
			<H2>Cancellations and Notifications of Teachers</H2>
			<p>If you are unable to make an appointment and would lik to reschedule, we can help! 
			</p>
		</div>';
}
function showContactPage(){
	echo'
		<div id = "contactDiv">
			<h2> Contact Information</h2>
			<p id="paddingdiv"> Here we will give the contact information of the people who will be able to answer your questoins. It will be coming soon!</p>
		</div>
	';

}
function showFAQPage(){
	echo '
		<div id="FAQ">
			<H2>Frequentyl Asked Questions</H2>
			<p>Here we will try to answer some of the most frequently asked questions by our users. 
			</p>
		</div>';
}
function showHelpPage(){
	echo '
		<div id="aboutdiv">
			<H2>Help Forums Page</H2>
			<p>Here you can post and search forums for questions about topics of Wan2Learn. 
			</p>
		</div>';
}