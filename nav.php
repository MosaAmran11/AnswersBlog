<!-- Navigation -->
<nav>
    <a href="index.php"> الصفحة الرئيسية </a>
    <a href="about_us.php"> حول الموقع </a>
    <a href="contact_us.php"> اتصل بنا </a>
    <?php
    if (@$_SESSION['user_type'] == 'admin')
        echo "<a href='dashboard/index.php'></a>";
    ?>

</nav>