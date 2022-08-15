<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectpizza";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, price FROM pizzas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Price</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["price"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
<a href="registration.php" class="mt-5 mb-3 text-muted">Back</a>
<div>

</div>
<!DOCTYPE html>
<html>
<head>
    <title>Pizza Envanter</title>
</head>
<body>
    <div>
        <form>

        
        </form>
    </div>

</body>
</html>
	