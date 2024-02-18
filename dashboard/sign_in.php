<?php
session_start();
ob_start("ob_gzhandler");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.101.0">
  <title>Signin</title>

  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="./css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <?php
  $E_email = "";
  $E_password = "";
  $er = "";
  $OK = 1;
  if (isset($_POST['login'])) {
    if (isset($_POST['adminEmail']) && isset($_POST['adminPass'])) {
      $email = $_POST['adminEmail'];
      $pass = $_POST['adminPass'];
    }
    if (empty($email)) {
      $E_email = "Please Enter the Email";
      $OK = 0;
    }
    if (empty($pass)) {
      $E_password = "Please Enter the Password";
      $OK = 0;
    }
    if ($OK == 1) {
      require_once('../config.php');
      $pass = $_POST['adminPass']; // md5($_POST['adminPass'])
      $per = 'admin';
      $sql = "SELECT * FROM user WHERE user_email = '$email' AND user_password = '$pass'";
      $exe = mysqli_query($conn, $sql);
      $found = false;
      while ($row = mysqli_fetch_assoc($exe)) {
        if ($email == $row['user_email'] && $pass == $row['user_password'] && $per == $row['user_type']) {
          $_SESSION['adminId'] = $row['user_id'];
          $_SESSION['adminName'] = $row['user_name'];
          $found = true;
          header('location:../index.php');
        }
      }
      if (!$found) {
        $er = 'Incorrect Email or Password';
      }
    }
  }
  ?>
  <main class="form-signin w-100 m-auto">
    <form action="sign_in.php" method="POST">
      <svg class="mb-4" xmlns="http://www.w3.org/2000/svg" width="72" height="57" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
        <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
      </svg>
      <h1 class="h3 mb-3 fw-normal">يرجى تسجيل الدخول إلى لوحة التحكم</h1>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="adminEmail">
        <label for="floatingInput">البريد الإلكتروني</label>
        <p style="background-color:red;"><?php echo $E_email; ?></p>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="adminPass">
        <label for="floatingPassword">كلمة المرور</label>
        <p style="background-color:red;"><?php echo $E_password; ?></p>
      </div>
      <p style="background-color: red ;"><?php echo $er; ?></p>
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">تسجيل الدخول</button>
      <p class="mt-5 mb-3 text-muted">Answers Blog, 2024&copy;</p>
    </form>
  </main>

</body>

</html>
<?php
ob_end_flush();
?>