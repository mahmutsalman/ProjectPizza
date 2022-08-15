
<?php
session_start();
require_once('config.php');
if($_SESSION['approval']!==true){
header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
	
		
	<head>
		<title>Hoşgeldiniz</title>
		<link rel="stylesheet" type="text/css" href="style2.css">
		<style>
			input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
		</style>
	</head>
	<body style="background: url(pic1.jpg)">
		<!--<center><h1>Pizza's Admin Panel</h1></center>-->
		<div>
			<?php
			if(isset($_POST['create1'])){
				$name    =$_POST['name'];
				$price   =$_POST['price'];
				if(preg_match("/^[a-zA-Z0-9 ]*$/",$name)&& preg_match("/^[a-zA-Z0-9 ]*$/",$price)){
					$sql = "INSERT INTO pizzas (name, price ) VALUES('$name','$price')";
					
				//$stmtinsert = $db->prepare($sql);
				
				//$result = $stmtinsert->execute();
					
					
				
				
				if($db->query($sql) === TRUE){
					echo '<script type="text/javascript"> alert(" Veritabanına başarı ile kaydedildi.") </script>';
				}else{
					echo 'Veri kaydedilirken hata meydana geldi.';
				}
					
				}
				else{
					echo 'Harf ve/veya rakam kullanınız...';
				}
			
			
				}
				
				if(isset($_POST['cıkıs'])){
					if(isset($_POST['cıkıs'])){
			session_destroy();
			header('location:login.php');
			}
				}
				if(isset($_POST['discount'])){
					$discount=$_POST['discountvalue'];
					if(preg_match("/^[0-25 ]*$/",$discount)) {
						$sql = " UPDATE pizzas SET price = (price *(100-$discount)/100)";
					$stmt = $db->prepare($sql);
					$result=$stmt->execute();
					if($result){
						echo '<script type="text/javascript"> alert(" İndirim Başarıyla Yapıldı.") </script>';
					}
					else{
						echo 'İndirim yapılamadı.';
					}
					}
					else{
						echo '<script type="text/javascript"> alert(" 1-20 arasında değer giriniz...") </script>';
					}
				}
			?>
		</div>
		<div>
			<form action="registration.php" method="post">
				<div class="container">
					
					
					<!-- col-sm-3 denedim buraya düzgün çalışmadı-->
					
					
					
					<center><p>Formu Doldurun.</p></center>
					
					<!--<hr class="mb-3"> ne için kullanılıyor? -->
					<hr class="mb-3">
					
					<!-- Sorgu sayısı kadar label olacak aşağıda-->
					<label for = "name"><b>Pizza İsmi</b></label>
					<input class="from-control" type="text" name="name" required>
					
					
					<label for = "price"><b>Pizza Fiyatı</b></label>
					<input class="from-control" type="text" name="price" required>
					<input class="btn btn-primary" type="submit" name="create1" value="Kaydet">
					
					
					
					
					
					
					
					
					
					
					<a href="index.php" class="mt-5 mb-3 text-muted" style="color:#3ec038">Pizza Envanteri</a>
					
					
					
					
				</div>
			</form>
			<form action="registration.php" method="post">
				<label for = "discountvalue"><b>Tüm Ürünler İçin İndirim Yüzdesi</b></label>
				<input class="from-control" type="text" name="discountvalue" required>
				
				<input class="btn btn-primary" type="submit" name="discount" value="İndirim yap">
			</form>
			
			<form method="post"  action="registration.php">
				
				
				<?php
				$sql = "SELECT name, price FROM pizzas";
				$result2 = $db->query($sql);
				if ($result2->num_rows > 0){
					
				echo "<select name= 'hold'>";
					
					while($row = $result2->fetch_assoc()) {
					echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
					}
					$hold = $_POST["hold"];
					
					}
					
					?>
					
					
					
				</form>
			</div>
			<form >
                        <label for = "discountvalue"><b>İndirim Miktarı yazınız</b></label>
                        <input class="from-control" type="text" name="discountvalue1" required="">
                        
                        <input class="btn btn-primary" type="submit" name="discount1" value="İndirim yap">
                        <?php
                        if(isset($_POST['discount1'])){
                        $discountvalue1=$_POST['discountvalue1'];
                        //$sql = "SELECT price FROM pizzas WHERE name='$hold'";

                        //$result3=mysql_query($conn,$sql);

                        $query= "select name from pizzas where name ='$hold'";
                        $resultSet = mysqli_query($db,$query);

                        if(mysqli_num_rows($resultSet) > 0){
                            $row = mysqli_fetch_assoc($resultSet);
                            $sql = " UPDATE pizzas SET price = (price *(100-$discountvalue1)/100) WHERE name='$hold'";
                    $stmt = $db->prepare($sql);
                    $result4=$stmt->execute();
                    if($result4){
                        echo '<script type="text/javascript"> alert(" İndirim başarıyla yapıldı...") </script>';
                    }
                    else{
                        echo '<script type="text/javascript"> alert(" İndirim Yapılamadı...") </script>';
                    }

                        }
                        

                        
                       
                        }
                        
                        ?>
                    </form>
			 
		</body>

		<form action="registration.php" method="post">
			<input type="submit" name="cıkıs" value="Çıkış">
		</form>
		 	<!--<div id="form-loading" class="hide"><i class="fa fa-circle-o-notch fa-spin"></i></div>-->

		
		
		
	</html>