<?php
require_once('header.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Edit Post</h2>
    <hr>
    <?php
    if (isset($_GET['val'])) {
        $post_id = $_GET['val'];
        require_once('../config.php');
        $sql = "select * from post where post_id = $post_id";
        $exe = mysqli_query($conn, $sql);
        if (!$exe) {
            die("Selected Erorr" . mysqli_error($conn));
        }
        $row = mysqli_fetch_assoc($exe);
        if (isset($_POST['edit_post'])) {
            if (isset($_FILES['post_uplode']) && !empty($_FILES['post_uplode']['tmp_name'])) {
                $folder = "./post_uplode/";
                $img = $_FILES['post_uplode']['name'];
                $tmp = $_FILES['post_uplode']['tmp_name'];
                $title = $_POST['post_title'];
                $date = $_POST['post_date'];
                $text = $_POST['post_text'];
                $text_r = str_replace("'", "''", "$text");
                $type = $_POST['post_type'];
                $sql = "UPDATE `post` SET `post_title` = '$title', `post_date` = '$date', 
                `post_text` = '$text_r', `post_type` = '$type' , `post_img` = '$img' WHERE `post`.`post_id` = $post_id";
                $exe = mysqli_query($conn, $sql);
                if (!$exe) {
                    echo "U Error" . mysqli_error($conn);
                } else {
                    move_uploaded_file($tmp, $folder . $img);
                    header('location:post.php');
                }
            } else {
                $title = $_POST['post_title'];
                $date = $_POST['post_date'];
                $text = $_POST['post_text'];
                $text_r = str_replace("'", "''", "$text");
                $type = $_POST['post_type'];
                $sql = "UPDATE `post` SET `post_title` = '$title', `post_date` = '$date', 
                `post_text` = '$text_r', `post_type` = '$type' WHERE `post`.`post_id` = $post_id";
                $exe = mysqli_query($conn, $sql);
                if (!$exe) {
                    echo "Update Error" . mysqli_error($conn);
                } else {
                    header('location:posts.php');
                }
            }
        }
    }
    mysqli_close($conn);
    ?>
    <form name="Post" id="add_ne" action="" method="POST" enctype="multipart/form-data">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td><label class="form-label">Post Title:</label></td>
                    <td><input class="form-control" id="title" type="text" name="post_title" value="<?php echo $row['post_title']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Post Date:</label></td>
                    <td><input class="form-control" id="date" type="datetime-local" name="post_date" value="<?php echo $row['post_date']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Post Text:</label></td>
                    <td><textarea name="post_text" id="editor"><?php echo $row['post_text']; ?></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#editor'))
                                .then(editor => {
                                    console.log(editor);
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </td>
                </tr>
                <tr>
                    <td><label>Post Type:</label></td>
                    <td id="ff">
                        <input type="text" class="form-control" value="<?php echo $row['post_type'];  ?>" onclick="noned();">
                    </td>
                    <td id="f">
                        <select name="post_type" id="type">
                            <option value="<?php echo $row['post_type'];  ?>"></option>
                            <option value="أنظمة تشغيل">أنظمة تشغيل</option>
                            <option value="تطبيقات">تطبيقات</option>
                            <option value="أخبار تقنية">أخبار تقنية</option>
                            <option value="مشاكل وحلول">مشاكل وحلول</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Uplode Post Image:</td>
                    <td><img class="w-50 h-50 my-2" src="./post_uplode/<?php echo $row['post_img']; ?>" height="230px">
                        <label id="format"><input class="form-control" type="file" name="post_uplode">
                            The allowed formats here are (jpg,png,svg)</label>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-success" type="submit" value="Update" name="edit_post">
                        <a href="./post.php" class="btn btn-danger">Cancel</a>
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