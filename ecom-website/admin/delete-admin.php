<?php 

include('../config/constants.php');

$id = $_GET['id'];

$sql ="DELETE FROM admin WHERE id=$id" ;

$res = mysqli_query($conn, $sql);

if($res==true){
     //query executed successfully and admin deleted
     // create session variable to display message
     $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
     //red,rect to manage admin page
     header('location:' .SITEURL.'admin/manage-admin.php');

}
else{
        //echo 'failed to delete admin';
        $_SESSION['delete'] = "<div class='error'> Failed to deleted admin. Try again later</div>";
        header('location:' .SITEURL.'admin/manage-admin.php');


}

?>

   
    
