<?php 

session_start();

define('SITEURL', 'http://localhost/php/ecom-website/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ecom-website');

$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
$db_select=mysqli_select_db($conn, 'ecom-website') or die(mysqli_error($conn));

?>