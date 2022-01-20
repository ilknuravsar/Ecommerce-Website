<?php


//authorization access control

//check whetrher the user is logged in or not
if(!isset($_SESSION['user'])){//if user session is not set

//user is not logged in
//rediect to login page with message
$_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access admin panel</div>";

//redirect to login pae
header('location:' .SITEURL. 'admin/login.php');
}
?>