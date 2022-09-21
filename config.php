
<?php
// credentials that needed to connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dataBase = "nnmr";

$conn = mysqli_connect($servername, $username, $password, $dataBase);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
?>