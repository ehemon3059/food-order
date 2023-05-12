<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php 
       
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }

        $position ='';
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Position</td>
                    <td>
                        <select name="position" id="">
                            <option <?php if($position == 'Owner') {echo "selected" ;} ?> value="owner">Owner</option>
                            <option <?php if($position == 'manager') {echo "selected" ;} ?> value="manager">Manager</option>
                            <option <?php if($position == 'regular staff'){echo "selected";}?> value="regular staff">regular staff</option>
                            <option <?php if($position == 'delivery man') {echo "selected";}?> value="delivery man">delivery man</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    
    {

        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $position =$_POST['position'];
        $password = md5($_POST['password']); //Password Encryption with MD5

        //2.to check already user exist or not 
        $query1 = "SELECT * FROM `tbl_admin` WHERE `username`= '$username'";

        // Execute query
        $result = mysqli_query($conn, $query1);

        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
        // User already exists

        $_SESSION['add'] = "<div class='error'>User already exists with this username.</div>";
       // header("location:" . SITEURL . 'admin/add-admin.php');
        echo "<script> window.location.href = 'http://localhost/food-order/admin/add-admin.php' </script>";
        } else {

            // User does not exist
            // Proceed with signup process

            //3. SQL Query to Save the data into database
            $sql = "INSERT INTO tbl_admin SET 
                full_name='$full_name',
                username='$username',
                position='$position',
                password='$password'
            ";

            //3. Executing Query and Saving Data into Database
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
            if ($res == TRUE) {
                //Data Inserted
                //echo "Data Inserted";
                //Create a Session Variable to Display Message
                $_SESSION['add'] = "<div class='success'>User Added Successfully.</div>";
                //Redirect Page to Manage Admin
              //  header("location:" . SITEURL .'admin/manage-admin.php');
                echo "<script> window.location.href = 'http://localhost/food-order/admin/manage-admin.php' </script>";
            } else {
                //FAiled to Insert DAta
                //echo "Faile to Insert Data";
                //Create a Session Variable to Display Message
                $_SESSION['add'] = "<div class='error'>Failed to Add User.</div>";
                //Redirect Page to Add Admin
              //  header("location:" . SITEURL .'admin/add-admin.php');
                echo "<script> window.location.href = 'http://localhost/food-order/admin/manage-admin.php' </script>";
            }

        }




        

    }
    
?>