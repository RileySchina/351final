<?php

function dbconnect(&$connection) {
		// Create database connection
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "equipment_database";
		$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		
		// Test if connection succeeded
		if(mysqli_connect_errno()) {
			die("Database connection failed: ". mysqli_connect_errno());
		}
	}

dbconnect($connection);

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
// // $myusername = mysql_real_escape_string($myusername);
// $mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM users WHERE name='$myusername' and password='$mypassword'";
$result=mysqli_query($connection,$sql);
// printf($sql);
// Mysql_num_row is counting table row
 $count=mysqli_num_rows($result);
// printf($count);
// If result matched $myusername and $mypassword, table row must be 1 row
$query = parse_url($url, PHP_URL_QUERY);
if ($query) {
    $url .= "url=select_item_class.php?username=". $myusername ;
    }
if($count==1){
header("Refresh: 0; url=home.php?username=". $myusername ); // after 5sec it redirects to homepage
// header("Refresh: 0; url=select_item_class.php?username=". $myusername );
// header("Refresh: 0; url=select_item_type.php?username=". $myusername ); // after 5sec it redirects to homepage
exit;#should be added so rest of page doesn't load.

// Register $myusername, $mypassword and redirect to file "login_success.php"
// session_register("myusername");
// session_register("mypassword"); 
header("location:login_success.php");
}
else {


die(header("location:main_login.php?loginFailed=true&reason=password")); // goes back to login page if it fails
echo"Wrong Username or Password";
}

?>