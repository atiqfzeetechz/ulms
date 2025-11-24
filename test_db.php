<?php
$connection = mysqli_connect("localhost", "root", "root123", "tester_db");
if (!$connection) {
    $connection = mysqli_connect("localhost", "root", "root", "tester_db");
}
if (!$connection) {
    $connection = mysqli_connect("localhost", "root", "root123", "tester_db");
}if (!$connection) {
    $connection = mysqli_connect("localhost", "root", "Root@12345", "tester_db");
}
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully to database: tester_db";
mysqli_close($connection);
?>