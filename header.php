<?php session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>حلول تكنولوجيا</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <!-- My CSS -->
    <link rel="stylesheet" href="./css/style.css" />
    <meta name="description" contact="تهتم بحل مشاكل الأندرويد والكمبيوتر" />
</head>

<body>
    <!-- header -->
    <div class="container">
        <header id="header" class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-1">
            <div class="fs-4">
                <a href="index.php">
                    <img class="img-head" src="img/la.png" alt="حلول تكنولوجيا" /></a>
            </div>
            <div class="col-md-3 text-center">
                <span class="fs-6"><?php ?></span>
                <?php
                if (!isset($_SESSION['userId'])) {
                    echo "<a href='sign_up.php' type='button' class='btn btn-outline-light me-2'>إنشاء حساب</a>";
                    echo "<a href='sign_in.php' type='button' class='btn btn-outline-light me-2'>تسجيل الدخول</a>";
                } elseif (isset($_SESSION['userName'])) {
                    echo "مرحباً: " . $_SESSION['userName'];
                    echo "<a href='./sign_out.php' type='button' class='btn btn-outline-light me-2'>تسجيل خروج</a>";
                }
                if (@$_SESSION['userType'] == 'admin')
                    echo "<a href='./dashboard/index.php' type='button' class='btn btn-outline-light me-2'>لوحة التحكم</a>";
                ?>
            </div>
        </header>