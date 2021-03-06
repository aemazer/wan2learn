<?php session_start();?>
<!DOCTYPE HTML>
<head>
  <title>Change your Photo</title>
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
		

			if (!empty($_FILES['photofile']['name'])) {
				if (!is_uploaded_file($_FILES['photofile']['tmp_name'])) {
					die($_FILES['photofile']['name'] . " is not a valid file.");
				}
				require 'config.php';

				$sourcefile = imagecreatefromstring(file_get_contents($_FILES['photofile']['tmp_name']));
				/********* PHOTO PROCESSING ***********/
				// Constrain to 600x600
				if ( (imagesx($sourcefile) < 600) && (imagesy($sourcefile) < 600) ) {
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
				if (imagesx($sourcefile) > imagesy($sourcefile)) {
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
				$query = "SELECT *
				FROM images
				WHERE images.username='" . $_SESSION['username'] . "'";

				$result = mysql_query($query, $dblink)
					or die("Query failed");
				$returnMe = (mysql_num_rows($result) == 1);


				if($returnMe){
					$query = "DELETE FROM images WHERE username=" . $_SESSION['username'];
					$result = mysql_query($query, $dblink) or die("delete query failed" + mysql_error());
					
					$query = "INSERT INTO images(username,photoname,phototype,
					photodata,thumbwidth,thumbheight,thumbdata) 
					VALUES ('" . $username . "', '" .
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
					header('Location: profile.php');

					exit();
				}
				else{
					echo '';
				}


				/*				$query = 'UPDATE images (photoname,
				photodata,thumbwidth,thumbheight,thumbdata) 
				SET photoname='\' . addslashes($_FILES[\'photofile\'][\'name\']) 
				. '\', photodata=\'' . mysql_real_escape_string($photodata)
				. '\', photoname=\'' . addslashes($_FILES[\'photofile\'][\'name\'])
				. '\', thumbwidth=\'' . $newx
				. '\', thumbheight=\'' . $newy
				. '\', photoname=\'' . mysql_real_escape_string($thumbdata)
				. '\' WHERE ';
				/*$query = "INSERT INTO images(photoname,
				photodata,thumbwidth,thumbheight,thumbdata) 
				VALUES ('. 
					addslashes($_FILES['photofile']['name']) . ',
					' . mysql_real_escape_string($photodata) . ',
					$newx,
					$newy,
					' . mysql_real_escape_string($thumbdata) . ')";

				$query = "UPDATE images
				SET photoname ='" . addslashes($_FILES['photofile']['name']) . "', photodata='" . mysql_real_escape_string($photodata) . "', thumbwidth = '" .$newx . "', thumbheight = '".$newy."', thumbdata='" . mysql_real_escape_string($thumbdata) . "'
				WHERE username='". $_SESSION['username'] . "'";*/
			}
		?>
		<div id = "uploadPhotoDiv">
			<p>One last step: upload a photo of yourself!</p>
			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
				Upload Photo File: <input type="file" name="photofile" />
				<input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>" />
				<input type="submit" value="Upload" />
			</form>
		</div>

	</div>
</body>