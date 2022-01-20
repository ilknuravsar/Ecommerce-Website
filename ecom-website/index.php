<?php include('partials-front/menu.php'); ?>
<section class="product-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for product.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>


<?php 
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>
<section class="categories">
    <div class="container">
        <?php 
            $sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes'";
         
            $res = mysqli_query($conn, $sql);
        
            $count = mysqli_num_rows($res);

            if($count>0)
            {
       
                while($row=mysqli_fetch_assoc($res))
                {
             
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <a href="<?php echo SITEURL; ?>category-product.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php 
                                if($image_name=="")
                                {
                                    echo "<div class='error'>Image not Available</div>";
                                }
                                else
                                {

                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                echo "<div class='error'>Category not Added.</div>";
            }
        ?>
        <div class="clearfix"></div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>