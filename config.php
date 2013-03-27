<?php

$dbhost = 'localhost';
$dbuser = 'faul9383';
$dbpassword = '$TR@t3gic1';
$dbdatabase = 'faul9383';

// Connecting, selecting database
$dblink = mysql_connect($dbhost, $dbuser, $dbpassword)
<<<<<<< HEAD
    or die("Could not connect to database at $dbhost");

mysql_select_db($dbdatabase,$dblink)
    or die("Could not select database $dbdatabase " . mysql_error());


=======
    or die("Could not connect to database at $dbhost: " . mysql_errno() . ": " . mysql_error());

mysql_select_db($dbdatabase,$dblink)
    or die("Could not select database $dbdatabase: " . mysql_errno() . ": " . mysql_error());
>>>>>>> Registration Works
