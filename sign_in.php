<?php session_start();
ob_start("ob_gzhandler"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--My Css -->
    <link rel="stylesheet" href="./css/mystyle.css">
</head>

<body dir="rtl">
    <?php
    $E_email = "";
    $E_password = "";
    $er = "";
    $OK = true;
    if (isset($_POST['login'])) {
        if (isset($_POST['user_email']) && isset($_POST['user_pass'])) {
            $email = $_POST['user_email'];
            $pass = $_POST['user_pass'];
        }
        if (empty($email)) {
            $E_email = "يرجى إدخال البريد الإلكتروني";
            $OK = false;
        }
        if (empty($pass)) {
            $E_password = "يرجى إدخال كلمة المرور";
            $OK = false;
        }
        if ($OK) {
            require_once('./config.php');
            $pass = $_POST['user_pass']; // md5($_POST['adminPass'])
            $per = '';
            $sql = "SELECT * FROM user WHERE user_email = '$email' AND user_password = '$pass'";
            $exe = mysqli_query($conn, $sql);
            $found = false;
            while ($row = mysqli_fetch_assoc($exe)) {
                if ($email == $row['user_email'] && $pass == $row['user_password']) {
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_name'];
                    $_POST['user_name'] = $row['user_name'];
                    $_POST['user_type'] = $row['user_type'];
                    $found = true;
                    header('location:./index.php');
                }
            }
            if (!$found) {
                $er = 'خطأ في البريد اللإلكتروني أو كلمة المرور';
            }
        }
    }
    ?>
    <div class="modal modal-signin position-static d-block bg-white py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <!-- <h5 class="modal-title">Modal title</h5> -->
                    <h2 class="fw-bold mb-0">تسجيل الدخول</h2>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form class="" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="floatingInput" name="user_email" placeholder="name@example.com">
                            <label for="floatingInput">عنوان البريد الإلكتروني</label>
                            <p style="color:red;"><?php echo $E_email; ?></p>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="floatingPassword" name="user_pass" placeholder="Password">
                            <label for="floatingPassword">كلمة المرور</label>
                            <p style="color:red;"><?php echo $E_password; ?></p>
                        </div>
                        <p style="color: red ;"><?php echo $er; ?></p>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" name="login">تسجيل الدخول</button>
                        <hr class="my-4">
                        <a href="./index.php" class="w-100 mb-2 btn btn-lg rounded-3 btn-danger" type="submit">إلغاء</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
//if (isset($_POST['login'])) { // if form is submitted
//    // $email = $_POST['user_email'];
//    // $pass = $_POST['user_pass'];
//    $per = '';
//    $sql = "SELECT * FROM user WHERE user_email = '$email' AND user_password = '$pass'";
//    $exe = mysqli_query($conn, $sql);
//    // $found = false;
//    while ($row = mysqli_fetch_assoc($exe)) {
//        if ($email == $row['user_email'] && $pass == $row['user_password']) {
//            $_SESSION['adminId'] = $row['user_id'];
//            $_SESSION['adminName'] = $row['user_name'];
//            $_SESSION['user_type'] = $row['user_type'];
//            // $found = true;
//            header('location:./index.php');
//        } else {
//            echo "Incorrect Email or Password";
//        }
//    }
//}
//
?>
<?php
ob_end_flush();
?>