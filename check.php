<?php
$host = "localhost"; // Host name
$user = "root"; // User
$password = ""; // Password
$dbname = "projectpizza"; // Database name
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
function nameC($name){
					$host = "localhost"; // Host name
						$user = "root"; // User
						$password = ""; // Password
						$dbname = "projectpizza"; // Database name
						$con = mysqli_connect($host, $user, $password,$dbname);
						// $sql="select * from users where (nane='$name' )";
						$query= "select name from users where name ='$name'";
						$res=mysqli_query($con,$query);
						if (mysqli_num_rows($res) > 0 )  {
							return 1;
						}
						
						else if(!preg_match("/^[a-zA-Z0-9 ]*$/",$name)) {
							return 2;
						}
						else{
							return 0;
						}
					}
?>