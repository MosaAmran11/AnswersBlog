<?php
require_once('header.php');
require_once('nav.php');
?>
<!-- main  -->
<div style="margin-top:20px;margin-bottom:20px;" class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3>اتصل بنا</h3>
        <form id="contact" action="" method="post">
            <div class="row">
                <div class="col-md-12">
                    <input placeholder="ادخل اسمك" name="name_sender" id="name_s" class="form-control" type="text" onchange="checkC();">
                </div>
            </div>
            <div style="margin-top:20px;margin-bottom:20px;" class="row">
                <div class="col-md-12">
                    <input placeholder="ادخل بريدك الإلكتروني" name="email_sender" id="email_s" class="form-control" type="email" onchange="checkC();">
                </div>
            </div>
            <div style="margin-top:20px;margin-bottom:20px;" class="row">
                <div class="col-md-12">
                    <textarea name="message" rows="10" class="form-control" id="mess_s" onchange="checkC();"></textarea>
                </div>
            </div>
            <div style="margin-top:20px;margin-bottom:20px;" class="row">
                <div class="col-md-12">
                    <input type="submit" value="إرسال" class="btn btn-success" id="send_c" name="send">
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['send'])) {
            require_once('config.php');
            $name = str_replace("'", "''", $_POST['name_sender']);
            $email = str_replace("'", "''", $_POST['email_sender']);
            $text = str_replace("'", "''", $_POST['message']);

            $sql = "INSERT INTO contact_us (cont_user_name, cont_user_email, cont_user_text) VALUES ('$name', '$email', '$text')";
            if (!@mysqli_query($conn, $sql)) {
                echo "Insertion Error";
            }
            mysqli_close($conn);
        }
        ?>
    </div>
    <div class="col-md-3"></div>
</div>
<?php
require_once('footer.php');
?>