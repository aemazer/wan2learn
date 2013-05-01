<?php 
function showHeader(){
	echo '
		<div id = "logoDiv"><a href = "index.php"><img src="images/mettalearnlogo.png"></a></div>
		<div id = "linksDiv">
			<p class="links">|<a href="contact.php">Contact</a>|<a href="help.php">Help</a>|<a href="cancellations.php">Cancellations</a>|<a href="faq.php">FAQs</a>|<a href="about.php">About</a>|<a href = "register.php">Register</a>|</p>
		</div>
		';
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
					<a class="label">I want to learn...</a>
					<br />
					<input type = "textarea" name = "search" value = "Search" id="bluesearch" />
					<br />
					<input type = "submit" value = "Teach Me!" id="bluesearchsubmit" />
					<br />
					<a class="label">I want to teach...</a>
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

					if((!isset($_POST['signIn']))&&(!isset($_SESSION['username']))){
						showSignInForm();
					}
					else if(isset($_SESSION['username'])){
						if(isset($_SESSION['login'])){
							showUserInfo();
						}
						else{
							showSignInForm();
						}

					}
					else{
						showUserInfo();
						//showSignInForm();
					}
			echo'
						
				</div>
			</td>
		</tr>
		<th colspan = "3"><br /><a id="topText">I want to learn from someone who is...</a><br /></th>
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
			<a class ="text">Not registered? Sign up <a href="register.php">here!</a></a>
		</form>';
}
function showUserInfo(){
	echo '
		<form action = "' . $_SERVER['PHP_SELF'] . '" method = "post">
			<a class = "label">Welcome Back!</a>
			<p class = "text"><a href="editprofile.php">Edit Profile</a></p>
			<input type = "submit" name = "logout" id = "logout" value = "Log out" />
		</form>
	';
}
function showHeaderLoggedIn($username){
	echo '
		<div id = "logoDiv"><a href = "index.php"><img src="images/mettalearnlogo.png"></a></div>
		<div id = "linksDiv">
			<p class="links">|<a href="contact.php">Contact</a>|<a href="help.php">Help</a>|<a href="cancellations.php">Cancellations</a>|<a href="faq.php">FAQs</a>|<a href="about.php">About</a>|Welcome, <a href="profile.php">' . $username . '</a>|</p>
		</div>';
}
function showRegistrationForm($server){
	echo'
	
		<form action = "' . $server . '" method = "post">
		<div id="register-wrapper">
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
					<label for="email">E-Mail Address: </label> 
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
			</ul> 
		</div>
			<br />
		<div>
			<ul> 
			<li class="buttons"> 
				<input type="submit" id = "submit" name="register" value="Register" /> 
				<input type="button" name="cancel" value="Cancel" onclick="location.href=\'homepage.php\'" /> 
			</li> 
			</ul> 
		</form> 
	</div>
	';
}
function registerUser(){
	require 'config.php';
	//info sent from form
	$email = $_POST['email'];
	$username=$_POST['username'];
<<<<<<< HEAD
	$password= $_POST['password'];
=======
	$password=$_POST['password'];
	//
>>>>>>> sha1 in place and working
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	$password = sha1($password);
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
						WHERE users.email='" . $email . "'";

						$result = mysql_query($query, $dblink)
							or die("Query failed");
						$returnMe = (mysql_num_rows($result) == 1);


						if($returnMe){
							echo 'E-mail address is already in use.';
						}
						else{
							mysql_query("INSERT INTO users(email, username, password, firstname, lastname) VALUES ('$email', '$username','$password','$firstname','$lastname')") or die(mysql_error());
							sendEmail($email, $username, $firstname, $password);
							$_SESSION['username']=$username;
							$_SESSION['registered']=1;
							echo "User is now registered!";
							header('Location: createprofile.php');

						}
					}	
					
				}
			}
		}
	}
}
function sendEmail($email, $username, $firstname, $password){
	$subject = "Welcome to Wan2Learn!";
	$message = "Welcome, ". $firstname ."! Thank you for joining us at Wan2Learn. We hope you're just as excited as us to get started, so just so you don't lose your information, here it is:
	Username: ". $username ."
	Password: ". $password."
	We should get started! Teach Anything, Learn Anything.";
    mail($email, $subject, $message, 'From: noreply@wan2learn.com');
        
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
	$password=sha1($password);
	$sql="SELECT * 
	FROM users 
	WHERE users.username='" . $username . "' AND users.password='" . $password . "'";

	$result=mysql_query($sql);

	// Mysql_num_row is counting table row
	$returnMe = (mysql_num_rows($result) == 1);


	// If result matched $myusername and $password, table row must be 1 row

	if($returnMe){
		// Register session variable to be passed to login and functions needed
		$_SESSION['username']=$username;
		$_SESSION['login']=1;
		//$_SESSION['password']=$password;
	}
	else {
		echo "Wrong Username or Password";
		unset($_SESSION['username']);
	}
}
function profile($username){
	require 'config.php';
	$query = "SELECT * 
	FROM users
	/*NATURAL JOIN userprofile*/
	WHERE users.username='" . $username . "'";

	$result = mysql_query($query, $dblink)
			or die ("Query failed." + mysql_error());

	while ($line = mysql_fetch_assoc($result)) {
		echo '<table> <tr><td> <div id = "profileDiv"> <p>Name: ' .$line['firstname'] . ' ' . $line['lastname']
		. ' </p> <p> E-mail: ' . $line['email'] . '</p>'
		. '<p> About Me: </p> <p>I am a: '. (($line['type'] == 'T') ? "Teacher" : "Student") . ', ' . (($line['type']=='S') ? "Student" : "Teacher") . ' </p> <p>I am interested in: '. $line['subjects'] . '  <p>' . $line['about'] . '</p> </div></td>';
	}
	
	$query = "SELECT id,photoname,thumbwidth,thumbheight 
	FROM images
	WHERE username ='" .$username . "'";
	
	$result = mysql_query($query, $dblink)
		or die ("Query failed." + mysql_error());
	while ($line = mysql_fetch_assoc($result)) {
	echo '<td><div id="profilePhotoDiv"><a href="showphoto.php?ID=' . $line['id'] . '"><img src="showphoto.php?ID=' . $line['id'] . '&type=t" width="' .
		$line['thumbwidth'] . '" height="' . $line['thumbheight'] . '" /></a><br />';
	}
	echo '<a href = "editPhoto.php">Change Photo </a></div></td></tr></table>';
	/*

	$query = 'select username,photoname,phototype,' .
	((isset($_REQUEST['type']) && ($_REQUEST['type'] == 't')) ?
		'thumbdata' : 'photodata') . ' AS imagedata
	 from images where images.username=' . $username;
	$result = mysql_query($query,$dblink);
	if (!$result) {
		die("Query $query failed. " . mysql_error());
	}
	if (mysql_num_rows($result) == 0) {
		die("No records found.");
	}	
	$line = mysql_fetch_assoc($result);
	if (!$line) {
		die("Couldn't retrieve row");
	}

	header('Content-type: ' . $line['phototype']);
	header('Content-Disposition: inline; filename="' . $line['photoname'] . '"');
	echo $line['imagedata'];*/
	

}
function dbcreateProfile($username){
	require 'config.php';
	$type = $_POST['type'];
	$about = $_POST['about'];
	$subjects = $_POST['subjects'];

	$query = 'UPDATE users
		SET about=\'' . $about 
		. '\', subjects=\'' . $subjects
		. '\', type=\'' . $type
		. '\' WHERE users.username=\'' . $username . '\'';
	
	mysql_query($query) or die(mysql_error());

	mysql_query("INSERT INTO userprofile(username, about, subjects, type) VALUES ('$username', '$about', '$subjects', '$type')")
		or die("query failed." + mysql_error());

	//echo "Query: '$query'<br />";  	// DEBUG!!
	header('Location: uploadPhoto.php');


}
function editProfile($username){
	require 'config.php';
	$query = "SELECT *
	FROM users
	WHERE username ='" .$username . "'";

	$result = mysql_query($query, $dblink)
		or die ("Query failed.");
	while($line = mysql_fetch_assoc($result)){
		echo '
			<br />
			<p>Edit your information:<p/>

		<form action = "' . $_SERVER['PHP_SELF'] . '" method = "post">
			<div id = "editProfile">
			<br />

				<input type = "checkbox" name = "type[]" value="T" />Teacher <br />
				<input type = "checkbox" name = "type[]" value="S" />Student <br />

				<label for"aboutTextArea">Tell us about yourself:</label>
				<textarea name = "about" id = "about" rows = "4" cols = "30" maxlength="1000">'. $line['about'].'</textarea>

				<label for"subjects">Type a few of your favorite things, separated by a comma</label>
				<input type = "text" id = "subjects" name = "subjects" value = "'. $line['subjects'].'"/>
				<input type="submit" value="Done Updating" name="editProfile" id = "editProfilebutton"/>

			</div>
		</form>';
	}

}
function runEditQuery($username){
	require 'config.php';
	$type = $_POST['type'];
	$about = $_POST['about'];
	$subjects = $_POST['subjects'];

	$query = 'UPDATE users
		SET about=\'' . $about 
		. '\', subjects=\'' . $subjects
		. '\', type=\'' . $type
		. '\' WHERE users.username=\'' . $username . '\'';
	
	mysql_query($query) or die(mysql_error());
	
	header('Location: profile.php');

}
function createProfile($username){
	echo '
	<form action = "' . $_SERVER['PHP_SELF'] . '" method = "post">
		<div>
			<input type = "checkbox" name = "type[]" value="T" />Teacher <br />
			<input type = "checkbox" name = "type[]" value="S" />Student <br />

			<label for"aboutTextArea">Tell us about yourself:</label>
			<textarea name = "about" id = "about" rows = "4" cols = "30" maxlength="1000" placeholder = "Howdy! Don\'t be shy, tell us something about you!"></textarea>

			<label for"subjects">Type a few of your favorite things, separated by a comma</label>
			<input type = "text" id = "subjects" name = "subjects" />
			<input type="submit" value="Done Updating" name="createProfile" id = "createProfilebutton"/>

		</div>
	</form>';

}
//code modified, credit to Andrew Coile.
/*function uploadPhoto($username){

	if (!empty($_FILES['photofile']['name'])) {
		if (!is_uploaded_file($_FILES['photofile']['tmp_name'])) {
			die($_FILES['photofile']['name'] . " is not a valid file.");
		}
		require 'config.php';

		$sourcefile = imagecreatefromstring(file_get_contents($_FILES['photofile']['tmp_name']));
		/********* PHOTO PROCESSING ***********/
		// Constrain to 600x600
		/*if ( (imagesx($sourcefile) < 600) && (imagesy($sourcefile) < 600) ) {
			$photofile = $sourcefile;
		}
		else {
			// we need to scale down the big image
		  if (imagesx($sourcefile) > imagesy($sourcefile)) {
		        // landscape orientation
		    $newx = 600;
		    $newy = round(600/imagesx($sourcefile)*   imagesy($sourcefile));
		  }
		  else {
		        // portrait orientation
		    $newx = round(600/imagesy($sourcefile)* imagesx($sourcefile));
		    $newy = 600;
		  }
		  $photofile = imagecreatetruecolor($newx,$newy);
		  imagecopyresampled ($photofile, $sourcefile, 0,0, 0,0, $newx, $newy, 
			imagesx($sourcefile), imagesy($sourcefile)); 
		  //echo "Photo sized down to $newx,$newy.<br />";
		}
		ob_start();
		imagejpeg($photofile);
		$photodata = ob_get_clean();
		/********* THUMBNAIL PROCESSING ***********/
		// Constrain to 150x150
		/*if (imagesx($sourcefile) > imagesy($sourcefile)) {
		        // landscape orientation
		  $newx = 150;
		  $newy = round(150/imagesx($sourcefile)*   imagesy($sourcefile));
		}
		else {
		        // portrait orientation
		  $newx = round(150/imagesy($sourcefile)* imagesx($sourcefile));
		  $newy = 150;
		}
		$thumb = imagecreatetruecolor($newx,$newy);
		imagecopyresampled ($thumb, $sourcefile, 0,0, 0,0, $newx, $newy, 
			imagesx($sourcefile), imagesy($sourcefile)); 
		ob_start();
		imagejpeg($thumb);
		$thumbdata = ob_get_clean();

		$query = "INSERT INTO images(username,photoname,phototype,
		photodata,thumbwidth,thumbheight,thumbdata) 
		VALUES ($username, ". 
			addslashes($_FILES['photofile']['name']) . "',
			'image/jpeg',
			'" . mysql_real_escape_string($photodata) . "',
			$newx,
			$newy,
			'" . mysql_real_escape_string($thumbdata) . "')";
		// echo "Query: '$query'<br />";  	// DEBUG!!
		mysql_query($query,$dblink) 
			or die("Update query failed: $query " . mysql_error());
		echo "<b>Photo upload of " . $_FILES['photofile']['name'] . 
			" succeeded.</b>";
		//echo "Thumbnail created ($newx,$newy).<br />";
		exit();
	}
}
//code credit to Andrew Coile.
function showPhoto(){
	$query = "SELECT username,photoname,thumbwidth,thumbheight 
	FROM uploadedphotos";
$result = mysql_query($query,$dblink) or die("Query failed: $query " . mysql_error());
while ($line = mysql_fetch_assoc($result)) {
	echo '<a href="showphoto.php?ID=' . $line['id'] . '"><img src="showphoto.php?ID=' . $line['id'] . '&type=t" width="' .
		$line['thumbwidth'] . '" height="' . $line['thumbheight'] . '" /></a>' .
		$line['photoname'] . "<br />\r\n";
}*/
function showAboutPage(){
		echo'
		<table>
			<tr>
				<td>
					<div id="RickB">
						<img src="images/rickBrandley.jpg" />
					</div>
				</td>
				<td>
					<div id="aboutdiv">
						<p class = "text"> MettāLearn. </p>
						<p class = "text">Mettā.  One of the ten perfections from the school of Buddhism. Loving-kindness, friendliness, benevolence, amity, friendship, good will, close mental union (same mental wavelength), active interest in others. </p>
						<p class = "text">Learn.  Acquisition of knowledge or skills through experience, practice, study, or by being taught. </p> 
						<p class = "text">Mission Statement</p>
						<p class = "text">MettāLearn’s mission is to connect students and instructors. </p>
					</div>
				</td>
			</tr>
		</table>
		';
}
function showCancellationsPage(){
	echo '
	<br />
	<br />
	<div id="cancelDiv">
		<H2>Cancellations and Notifications of Teachers</H2>
		<p>If you are unable to make an appointment and would like to reschedule, we can help! </p>
	</div>';
}
function showContactPage(){
	echo'
	<br />
	<br />
	<table>	
		<tr>
				<td>
					<div class="RickB">
						<img src="images/rickBrandley.jpg" />
					</div>
				</td>
				<td>
					<div id = "contactDiv">
						<h2> Contact Information</h2>
						<p> Rick Brandley</p>
						<p>rbrandley@csumb.edu</p>
						<p>(626) 644-1345</p>
					</div>
				</td>
			</tr>
		</table>
	';

}
function showFAQPage(){
	echo '
		<div id="FAQ">
			<br />
			<br />
			<H2>Frequently Asked Questions</H2>
			<p>Here we will try to answer some of the most frequently asked questions by our users.</p>
			<p><a href="#q1">How much does it cost to create a profile?</a></p>
			<p><a href="#q2">What can I learn on MettāLearn?</a></p>
			<p><a href="#q3">Where do MettāLearn instructors come from?</a></p>
			<p><a href="#q4">Where do classes take place?</a></p>
			<p><a href="#q5">Who can register?</a></p>
			<p><a href="#q6">How can I become a teacher on MettaLearn?</a></p>
			<p><a href="#q7">How can I become a student on MettaLearn?</a></p>
			<p><a href="#q8">How can I make an appointment?</a></p>
			<p><a href="#q9">How can I cancel an appointment?</a></p>
			<p><a href="#q10">Do I have to meet in person with the teacher?</a></p>
			<p><a href="#q11">How do I pay my teacher?</a></p>
			<p><a href="#q12">Can I register as both a teacher and a student?</a></p>
			<br />
			<br />
			<br />

			
			<p id = "q1">How much does it cost to create a profile?</p>
			<p>Absolutely free, does not cost anything. </p>
			<br />
			<p id = "q2">What can I learn on MettāLearn?</p>
			<p>MettāLearn is striving to be a place where students can find instructors for any and all subjects. This includes sports, school subjects, languages, instruments, and anything else you can think of.</p> 
			<br/>
			<p id = "q3">Where do MettāLearn instructors come from?</p>
			<p>MettāLearn instructors can come from anywhere. MettāLearn instructors can come from anywhere.</p>
			<br />
			<p id = "q4">Where do classes take place?</p>
			<p>Classes can take place in-person or online. Every case is different.</p>
			<br />
			<p id = "q5">Who can register?</p>
			<p>Anyone who is looking to learn something new, or teach something they know. </p>
			<br />
			<p id = "q6">How can I become a teacher on MettaLearn?</p>
			<p>Register! When you register, all you have to do to become a teacher is check the box on your profile that says "Teacher". </p>
			<br />
			<p id = "q7">How can I become a student on MettaLearn?</p>
			<p>Register! When you register, all you have to do to become a student is check the box on your profile that says "Student". </p>
			<br />
			<p id = "q8">How can I make an appointment?</p>
			<p>For now, it is best to contact your instructor by e-mail. We will let you know as this changes and becomes easier for everyone.</p>
			<br />
			<p id = "q9">How can I cancel an appointment?</p>
			<p>For now, it is best to contact your instructor by e-mail. We will let you know as this changes and becomes easier for everyone.</p>
			<br />
			<p id = "q10">Do I have to meet in person with the teacher?</p>
			<p>Generally now, but each case is different depending on the instructor. The beauty of MettaLearn is that you can contact the instructor you are looking for and design the best meeting environment for the both of you, whether that be in person, online, by phone or a mix.</p>
			<br />
			<p id = "q11">How do I pay my teacher?</p>
			<p>To pay your intstructor, we have a convienient payment method provided by PayPal. This ensures that everyone follows the rules and your instructors get paid!</p>
			<br />
			<p id = "q12">Can I register as both a teacher and a student?</p>
			<p>Of course! In fact, we encourage you to. Simply check both boxes labeled "Student" and "Teacher" on your profile.</p>
			<br />
		</div>';
}
function showHelpPage(){
	echo '
	<br />
	<br />
		<div id="helpdiv">
			<H2>Help Forums Page</H2>
			<p>Here you can post and search forums for questions about topics of Mettālearn. 
			</p>
		</div>';
}
