<?php 

    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/product/".$image_name;
            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['upload'] = "<div class='error'>Failed to remove image file</div>";
                header('location' .SITEURL. 'admin/manage-product.php');
                die();

            }

        }

        $sql = "DELETE FROM product WHERE id=$id";
        $res = mysqli_query($conn, $sql);


        if($res==true)
        {
            //product deleted
            $_SESSION['delete'] = "<div class='success'>Product deleted successfull.</div>";
            header('location'.SITEURL. 'admin/manage-product.php');

        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to delete product.</div>";
            header('location'.SITEURL. 'admin/manage-product.php');
        }

    }
    else
    {
        $_SESSION['unauthorize'] ="<div class='error'>Unauthorized access.</div>";
        header('location' .SITEURL. 'admin/manage-product.php');
    }

?>