<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectpizza";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name, price FROM pizzas";
$result2 = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pizza Listesi</title>
    </head>
    <body>
        <form method="post"  action="listofpizzas.php">
            
            
            <?php
            if ($result2->num_rows > 0){
            echo "<select name= 'hold'>";
                
                while($row = $result2->fetch_assoc()) {
                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                $hold = $_POST["hold"];
                
                }
                
                ?>
                
                
                
            </form>
            
            
            <div>
                <form>
                    <form>
                        <label for = "discountvalue"><b>İndirim Miktarı yazınız</b></label>
                        <input class="from-control" type="text" name="discountvalue" required="">
                        
                        <input class="btn btn-primary" type="submit" name="discount" value="İndirim yap">
                        <?php
                        if(isset($_POST['discount'])){
                        $discountvalue=$_POST['discountvalue'];
                        //$sql = "SELECT price FROM pizzas WHERE name='$hold'";

                        //$result3=mysql_query($conn,$sql);

                        $query= "select name from pizzas where name ='$hold'";
                        $resultSet = mysqli_query($conn,$query);

                        if(mysqli_num_rows($resultSet) > 0){
                            $row = mysqli_fetch_assoc($resultSet);
                            $sql = " UPDATE pizzas SET price = (price *(100-$discountvalue)/100) WHERE name='$hold'";
                    $stmt = $conn->prepare($sql);
                    $result4=$stmt->execute();
                    if($result4){
                        echo 'Başarıyla indirim yapıldı';
                    }
                    else{
                        echo 'İndirim yapılamadı.';
                    }

                        }
                        

                        
                       
                        }
                        
                        ?>
                    </form>
                    <a href="index.php" class="mt-5 mb-3 text-muted">Pizza Envanteri</a>
                </form>
            </div>
            
            
            
            
            
            
        </body>
        <?php
        echo "<h2>" . $hold . "</h2>";
        
        ?>
    </html>