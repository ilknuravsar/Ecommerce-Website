<?php 

include ('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //remove the physical image file is avaliable
    if($image_name != ""){
        //image is avaliable so remove it
        $path = "../images/category/".$image_name;
        //remove the image
        $remove = unlink($path);

        //if failed to remove image then add an error message and stop the proccess
        if($remove==false)
        {
            //set the session message
            $_SESSION['remove'] = "<div class='error'>Failed to remove category image.</div>";
            //redirect to manage category page
            header('location' .SITEURL. 'admin/manage-category.php');
            //stop the proccess
            die();

        }

    }
                $sql =  "DELETE FROM category WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                if($res==true){
                    $_SESSION['delete'] = "<div class='success'>Category deleted successfully.</div>";
                    header('location' .SITEURL . 'admin/manage-category.php');
                }
                else{
                    $_SESSION['delete'] = "<div class='error'>Failed to delete category.</div>";
                    header('location' .SITEURL . 'admin/manage-category.php');

                }



}
else{

    header('location' .SITEURL. 'admin/manage-category.php');

}

?>