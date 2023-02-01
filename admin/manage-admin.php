<?php include('partials/menu.php') ?>
<!-- Main content -->
<div class="main-content">
    <div class="wrapper">
    <h2>Manage Admin</h2>
        <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //Displaying Session Message
                    unset($_SESSION['add']); //Removing Session Message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }

            ?>
        <br><br><br>
        <!-- Button to add admin -->
        <a href="add-admin.php" class="btn-primary">Add admin</a>
        <br><br><br>
        <table class="tbl-full">
            <tr>
                <th>S.No.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <?php
                //Query to get all admin
                $sql = "SELECT * FROM tbl_admin";

                //Execute query
                $res = mysqli_query($conn, $sql);

                //Check whether the query is Execute or not
                if ($res==TRUE) {
                    //count rows to check whether we have data in database or not

                    $count = mysqli_num_rows($res);         //Function to get all the rows in database
                    $sn=1;          //create a var and assign the value

                    if($count>0) {
                        //we have data in db
                        while ($rows = mysqli_fetch_assoc($res)) {
                            //using while to get all th data from db and while loop will run as long as we have data in databse
                            //get individual data
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];

                            //dispaly the value in out table
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else{
                        //we do not have data in db
                    }
                }
            ?>
        </table>
    </div>
</div>
<?php include('partials/footer.php') ?>