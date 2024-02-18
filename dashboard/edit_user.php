<?php
require_once('header.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-11 px-md-4">
    <h2>Edit User</h2>
    <hr>
    <?php
    if (isset($_GET['eu'])) {
    $id = $_GET['eu'];
    require_once('../config.php');
    $sql = "select * from user where user_id = '$id'";
    $exe = mysqli_query($conn,$sql);
    if (!$exe) {
        echo("Selected Erorr" . mysqli_close($conn));
    }
    $row = mysqli_fetch_assoc($exe);
        $id = $row['user_id'];
        $name = $row['user_name'];
        $pass = $row['user_password'];
        $email = $row['user_email'];
        $phone = $row['phone'];
        $gender = $row['user_gender'];
        $country = $row['user_country'];
        $per = $row['user_type'];
        $img = $row['user_img'];
        if(isset($_POST['save_edit'])){
                if (isset($_FILES['user_uplode']) && !empty($_FILES['user_uplode']['tmp_name'])) {
                    $folder ="../Uplode/";
                    $img = $_FILES['user_uplode']['name'];
                    $tmp = $_FILES['user_uplode']['tmp_name'];
                    $id = $_POST['myid'];
                    $name = $_POST['user_name'];
                    $password = md5($_POST['user_password2']);
                    $email = $_POST['user_email'];
                    $phone = $_POST['user_tel'];
                    $gender = $_POST['user_gender'];
                    $country = $_POST['user_country'];
                    $type = $_POST['user_per'];
                    $sql = "update user set user_name = '$name', user_password = '$password', user_email = '$email',
                    phone = '$phone', user_gender = '$gender', user_country = '$country', user_type = '$type' , 
                    user_img = '$img'  WHERE user_id = $id";
                    $exe = mysqli_query($conn,$sql);
                    if(!$exe){
                        echo "Update Error" . mysqli_error($conn);
                    }
                    else{
                        move_uploaded_file($tmp,$folder.$img);
                        header('location:users.php');
                    }     
                }
                else {
                    $id = $_POST['myid'];
                    $name = $_POST['user_name'];
                    $password = md5($_POST['user_password2']);
                    $email = $_POST['user_email'];
                    $phone = $_POST['user_tel'];
                    $gender = $_POST['user_gender'];
                    $country = $_POST['user_country'];
                    $type = $_POST['user_per'];
                    $sql = "update user set user_name = '$name', user_password = '$password', user_email = '$email',
                    phone = '$phone', user_gender = '$gender', user_country = '$country', user_type = '$type' , 
                    user_img = '$img'  WHERE user_id = $id";
                    $exe = mysqli_query($conn,$sql);
                    if(!$exe){
                        echo "Update Error" . mysqli_error($conn);
                    }
                    else {
                        header('location:users.php');
                    }
                }      
            }
    }
    mysqli_close($conn);
    ?>
    <form name="User" id="edit_user" action="" method="POST" enctype="multipart/form-data">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td><label class="form-label">Name:</label></td>
                    <td><input class="form-control" id="name" type="text" value="<?php echo $name; ?>" name="user_name" placeholder="FristName MiddlelName LastName"></td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td><input class="form-control" id="pass" type="text" value=" <?php echo $pass; ?>" name="user_password1" placeholder="Must be at least 4 characters in uppercase, lowercase, number, symbol">
                    </td>
                </tr>
                <tr>
                    <td><label>Confirm Password:</label></td>
                    <td><input class="form-control" id="pass1" type="password" value="<?php echo $pass; ?>" name="user_password2"></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input class="form-control" id="email" type="email" value="<?php echo $email; ?>" name="user_email"></td>
                </tr>
                <tr>
                    <td><label>Phone Number:</label></td>
                    <td><input class="form-control" id="tel" type="tel" value="<?php echo $phone; ?>" name="user_tel" placeholder="Must consist of 9 numbers"></td>
                </tr>
                <tr>
                    <td><label>Gender:</label></td>
                    <td>
                        <input type="text" class="form-control" value="<?php echo $gender; ?>" disabled>
                        <input type="text" hidden class="form-control" name="user_gender" value="<?php echo $gender; ?>">
                        <input class="form-check-input" id="gender" type="radio" name="user_gender" value="Male">Male
                        <input class="form-check-input" id="gender" type="radio" name="user_gender" value="Female">Female
                    </td>
                </tr>
                <tr>
                    <td><label>Country:</label></td>
                    <td><select name="user_country" id="country">
                            <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                            <option value="Yemen">Yemen</option>
                            <option value="China">China</option>
                            <option value="KSA">KSA</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Permission:</label></td>
                    <td><select name="user_per" id="per">
                            <option value="<?php echo $per; ?>"><?php echo $per; ?></option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Uplode Image:</td>
                    <td><img class="w-30 h-30 my-2" src="../Uplode/<?php echo $img; ?>"  height="230px">
                        <label id="format"><input class="form-control" type="file" name="user_uplode">
                            The allowed formats here are (jpg,png,svg,jpeg)</label></td>
                </tr>
                <tr>
                    <td><input type="text" hidden name="myid" value = "<?php echo $id; ?>"></td>
                    <td>
                        <input class="btn btn-success" type="submit" value="Update User" name="save_edit">
                        <a href="./users.php" class="btn btn-danger">Cancel</a>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</main>
<!-- end main  -->
<?php
require_once('footer.php');
?>