<?php 
require_once('config.php');
include('check.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kaydol</title>
	<link rel="stylesheet" type="text/css" href="style4.css">
</head>
<body>

	<div class="divv">
		<form action="signup.php" method="post">
			<center><p>Kaydol</p></center>
				<p>Kullanıcı adı</p>
				<input type="text" name="name" placeholder="Kullanıcı adı" required="">
			<p>Şifre</p>
			<input type="password" name="password" placeholder="Şifre" required="">
			<br>
			<input type="submit" name="signup" value="Kaydol">
			<a href="login.php">Giriş Yap</a>
			
		</form>
	</div>
	<?php 
	if(isset($_POST['signup'])){
		$name    =$_POST['name'];
		$password   =$_POST['password'];
		$checkname=nameC($name);
		if(preg_match("/^[a-zA-Z0-9 ]*$/",$name)&& preg_match("/^[a-zA-Z0-9 ]*$/",$password)){
			if($checkname==0){
				$sql="INSERT INTO users (name,password,statu) VALUES ('$name','$password','0')";



				if($db->query($sql)){
					echo '<script type="text/javascript"> alert(" Kayıt oldunuz.") </script>';

				}
				else{
					echo '<script type="text/javascript"> alert(" Bir hata meydana geldi.Üzgünüz...") </script>';
				}

			}
			else{
				echo '<script type="text/javascript"> alert(" Bu kullancı adı daha önce alınmış...") </script>';

			}

			

		}
		else{
			echo  '<script type="text/javascript"> alert(" Abuk subuk Kullanıcı adı şifre") </script>';
		}





	}


	?>

</body>

</html>
