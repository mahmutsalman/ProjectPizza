<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectpizza";
$db = new mysqli($servername, $username, $password, $dbname,3308);
// Check connection
if ($db->connect_error) {
die("Connection failed: " . $db->connect_error);
}
//$sql = "SELECT name, price FROM pizzas";
//$result2 = $db->query($sql);
?>