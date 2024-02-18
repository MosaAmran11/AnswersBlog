<?php
require_once('header.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Add Post</h2>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <form name="Post" id="add_ne" action="#" method="POST" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td><label class="form-label">Post Title:</label></td>
                                    <td><input class="form-control" id="title" type="text" name="post_title"></td>
                                </tr>
                                <tr>
                                    <td><label>Post Date:</label></td>
                                    <td><input class="form-control" id="date" type="datetime-local" name="post_date">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Post Text:</label></td>
                                    <td><textarea name="post_text" id="editor"></textarea name="">
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
                                    <td><select name="post_type" id="type">
                                            <option value="أنظمة تشغيل">أنظمة تشغيل</option>
                                            <option value="تطبيقات">تطبيقات</option>
                                            <option value="أخبار تقنية">أخبار تقنية</option>
                                            <option value="مشاكل وحلول">مشاكل وحلول</option>
                                            <!-- <option value="History">History</option> -->
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Uplode Post Image:</td>
                                    <td><label id="format"><input class="form-control" type="file" name="post_uplode">
                                        The allowed formats here are (jpg,png,svg)</label></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                    <input class="btn btn-success" type="submit" value="Add" name="add_post">
                                    <a href="./post.php" class="btn btn-danger">Cancel</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['add_post'])) {
                        require_once('../config.php');
                        $title = $_POST['post_title'];
                        $date = $_POST['post_date'];
                        $text = $_POST['post_text'];
                        $textr = str_replace("'", "''", "$text");
                        $type = $_POST['post_type'];
                        $folder = "./post_uplode/";
                        $img = $_FILES['post_uplode']['name'];
                        $tmp = $_FILES['post_uplode']['tmp_name'];
                        $sql = "INSERT INTO posts (post_title, post_date, post_text,post_type,post_img)
                            VALUES ('$title', '$date', '$textr', '$type', '$img')";
                        $exe = mysqli_query($conn, $sql);
                        if (!$exe) {
                            echo "Insert Error" . mysqli_error($conn);
                        }
                        move_uploaded_file($tmp, $folder . $img);
                        mysqli_close($conn);
                    }
                    ?>
                </div>
            </div> 
        </div>
    </div>  
</main>
<!-- end main  -->
<?php
require_once('footer.php');
?>