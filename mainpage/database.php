<?php
$servername = 'localhost';
$username = 'default';
$password = '';
$database = 'Your-DbName';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die('Failed to connect: ' . mysqli_connect_error());
}
?>
