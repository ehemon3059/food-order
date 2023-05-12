<?php include('partials/menu.php'); ?>

<?php 
    //CHeck whether id is set or not 
    if(isset($_GET['id']))
    {
        //Get all the details
        $id = $_GET['id'];

        //SQL Query to Get the Selected Food
        $sql2 = "SELECT * FROM `service_area` WHERE `id`=$id";
        //execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Get the value based on query executed
        $row2 = mysqli_fetch_assoc($res2);

        //Get the Individual Values of Selected Food
        $previous_title = $row2['area_name'];

        $previous_image = $row2['area_image'];


    }
    else
    {
        //Redirect to Manage Food
        header('location:'.SITEURL.'admin/service_area.php.php');
        echo "<script> window.location.href = 'http://localhost/food-order/admin/service_area.php' <script>";
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Area</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="new_title" value="<?php echo $previous_title; ?>">
                </td>
            </tr>


           

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                        if($previous_image == "")
                        {
                            //Image not Available 
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //Image Available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $previous_image; ?>" width="150px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Select New Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            

           

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="previous_image" value="<?php echo $previous_image; ?>">

                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                //echo "Button Clicked";

                //1. Get all the details from the form
                $id = $_POST['id'];
                $area_name = $_POST['new_title'];
                $previous_image = $_POST['previous_image'];

                //2. Upload the image if selected

                //CHeck whether upload button is clicked or not
                if(isset($_FILES['image']['name']))
                {
                    //Upload BUtton Clicked
                    $image_name = $_FILES['image']['name']; //New Image NAme

                    //CHeck whether th file is available or not
                    if($image_name!="")
                    {
                        //IMage is Available
                        //A. Uploading New Image

                        //REname the Image
                       // $ext = end(explode('.', $image_name)); //Gets the extension of the image


                        $tmp = explode('.', $image_name);
                        $ext = end($tmp);


                        $image_name = "Area-Name-".rand(0000, 9999).'.'.$ext; //THis will be renamed image

                        //Get the Source Path and DEstination PAth
                        $src_path = $_FILES['image']['tmp_name']; //Source Path
                        $dest_path = "../images/food/".$image_name; //DEstination Path

                        //Upload the image
                        $upload = move_uploaded_file($src_path, $dest_path);

                        /// CHeck whether the image is uploaded or not
                        if($upload==false)
                        {
                            //FAiled to Upload
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload new Image.</div>";
                            //REdirect to Manage Food 
                          //  header('location:'.SITEURL.'admin/manage-food.php');
                          echo "<script> window.location.href = 'http://localhost/food-order/admin/service_area.php' <script>";
                            //Stop the Process
                            die();
                        }
                        //3. Remove the image if new image is uploaded and current image exists
                        //B. Remove current Image if Available
                        if($previous_image!="")
                        {
                            //Current Image is Available
                            //REmove the image
                            $remove_path = "../images/food/".$previous_image;

                            $remove = unlink($remove_path);

                            //Check whether the image is removed or not
                            if($remove==false)
                            {
                                //failed to remove current image
                                $_SESSION['remove-failed'] = "<div class='error'>Faile to remove current image.</div>";
                                //redirect to manage food
                             //   header('location:'.SITEURL.'admin/manage-food.php');
                             echo "<script> window.location.href = 'http://localhost/food-order/admin/service_area.php' <script>";
                                //stop the process
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $previous_image; //Default Image when Image is Not Selected
                    }
                }
                else
                {
                    $image_name = $previous_image; //Default Image when Button is not Clicked
                }

                

                //4. Update the Food in Database
                $sql3 = "UPDATE service_area SET 
                    area_name = '$area_name',  
                    area_image = '$image_name'
                    WHERE id=$id
                ";

                //Execute the SQL Query
                $res3 = mysqli_query($conn, $sql3);

                //CHeck whether the query is executed or not 
                if($res3==true)
                {
                    //Query Exectued and Food Updated
                    $_SESSION['update'] = "<div class='success'>Area Updated Successfully.</div>";
                  //  header('location:'.SITEURL.'admin/manage-food.php');
                //  echo "<script> window.location.href = 'http://localhost/food-order/admin/service_area.php' <script>";
                  echo "<script> window.location.href = 'http://localhost/food-order/admin/service_area.php' </script>";
                }
                else
                {
                    //Failed to Update Food
                    $_SESSION['update'] = "<div class='error'>Failed to Update Area.</div>";
                  //  header('location:'.SITEURL.'admin/manage-food.php');
                  echo "<script> window.location.href = 'http://localhost/food-order/admin/service_area.php' <script>";
                }

                
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>