<?php
$servername = "localhost";
$username = "root";
$password = "trapovejgulas";
$dbname = "Hermen_WA";
//sql script je v db.sql

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
