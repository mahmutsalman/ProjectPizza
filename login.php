<?php
session_start();
$host = "localhost"; // Host name
$user = "root"; // User
$password = ""; // Password
$dbname = "projectpizza"; // Database name
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Giriş Sayfası</title>
		<link rel="stylesheet" type="text/css" href="style2.css">
	</head>
	<body>
		
		
			
			<?php
			//echo 'enes';
			if(isset($_POST['signin'])){
				$name=$_POST['name'];
				
			
			$password=$_POST['password'];
			
			$query= "select * from admin where name ='$name'";
			$resultSet = mysqli_query($con,$query);
			if(mysqli_num_rows($resultSet) > 0){
				$row = mysqli_fetch_assoc($resultSet);
				if($row['name']=$name && $row['password']==$password){
					$_SESSION["approval"]= true;
				header('Location: registration.php');
				//die() eklenebilir buraya sanırım

				}
				else if($row['name']=$name && $row['password']!=$password){
					echo "<script>alert('Şifre hatalı.')</script>";


				}

				
			
			//echo "<script>alert('Admin Bulundu')</script>";
			}
			else{
			echo "<script>alert('Böyle admin yok.')</script>";
			}
			
			
			
			}
			?>
			
		
		<div class="loginbox">
			<h1>Giriş Sayfası</h1>
			<form action="login.php" method="post" >
				<p>Kullancı Adı</p>
				<input class="from-control" type="text" name="name" placeholder="Kullancı adı giriniz" required>
				<p>Şifre</p>
				<input class="from-control" type="password" name="password" placeholder="Şifre giriniz" required><br>
				<br>
				<input class="btn btn-primary" type="submit" name="signin" value="Giriş yap"><br>
				<a href="#">Lost Your Password</a><br>
				<a href="signup.php">Don't have an account</a>
				

				

			</form>





			
			
		</div>
	</body>
</html>