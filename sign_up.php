<?php
require_once('header.php');
require_once('nav.php');
$E_user_name = "";
$E_password1 = "";
$E_password2 = "";
$E_eq = "";
$E_email = "";
$E_phone = "";
$E_gender = "";
$E_country = "";
if (isset($_POST['ok'])) {
    require_once('config.php');
    $name = $_POST['user_name'];
    $password1 = $_POST['user_password1'];
    $password2 = $_POST['user_password2'];
    $email = $_POST['user_email'];
    $phone = $_POST['user_tel'];
    $gender = $_POST['user_gender'];
    $country = $_POST['user_country'];
    $type = "user";
    // password Strong
    $uppercase = preg_match('@[A-Z]@', $password1);
    $lowercase = preg_match('@[a-z]@', $password1);
    $number    = preg_match('@[0-9]@', $password1);
    $specialChars = preg_match('@[^\w]@', $password1);
    ////////////////////
    if (empty($name) || (!(ctype_alpha($name)))) {
        $E_user_name = "يجب أن يكون الاسم حروف فقط";
        // echo "<script>alert( 'You must enter the name or Enter only ALPHABET characters' )</script>";
    } elseif (
        empty($password1) || !$uppercase || !$lowercase || !$number
        || !$specialChars || strlen($password1) < 4
    ) {
        $E_password1 = "يجب أن لا تقل كلمة المرور عن 4 حروف وتتكون من رموز وأحرف كبيرة وصغيرة";
        // echo "<script>alert( 'Password should be at least 4 characters in length 
        // and should include at least one upper case letter, one number, and one special character' )</script>";
    } elseif (empty($password2)) {
        $E_password2 = "يجب تأكيد كلمة المرور";
        // echo "<script>alert( 'You must enter the confirming password' )</script>";
    } elseif ($password2 !== $password1) {
        $E_eq = 'كلمة المرور غير متطابقة';
        // echo "<script>alert( 'Your confirming password is not correct' )</script>";
    } elseif (
        empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))
        // (!preg_match("\w+@(gmail|hotmail|yahoo).(com|net|org)$", $email))
    ) {
        $E_email = 'يجب إدخال بريد الإلكتروني صحيح';
        // echo "<script>alert( 'Your email is either empty or Enter only with EMAIL FORMAT' )</script>";
    } elseif (empty($phone) || (!(ctype_digit($phone))) || strlen($phone) < 9) {
        $E_phone = 'يجب إدخال رقم هاتف صحيح';
        // echo "<script>alert( 'Your phone is either empty or Enter only NUMERIC data' )</script>";
    } elseif (empty($gender)) {
        $E_gender = "يجب اختيار الجنس";
        // echo "<script>alert( 'You must choease the gender' )</script>";
    } elseif (strlen($country) == 1) {
        $E_country = "يجب اختيار الدولة";
        // echo "<script>alert( 'You must choease the country' )</script>";
    } else if (isset($_FILES['user_upload']) && empty($_FILES['user_upload']['tmp_name'])) {
        $password2 = md5($_POST['user_password2']);
        $sql = "INSERT INTO user(user_name, user_password, user_email, user_phone, user_gender, user_country, user_type)
                VALUES('$name','$password2','$email','$phone','$gender','$country','$type')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Insert Error" . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        $folder = "./upload/";
        $img = $_FILES['user_upload']['name'];
        $tmp = $_FILES['user_upload']['tmp_name'];
        $password2 = md5($_POST['user_password2']);
        $sql = "INSERT INTO user(user_name,user_password,user_email,user_phone,user_gender,user_country,user_img,user_type)
                VALUES('$name','$password2','$email','$phone','$gender','$country','$img','$type')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Insert Error" . mysqli_error($conn);
        }
        move_uploaded_file($tmp, $folder . $img);
        mysqli_close($conn);
    }
}
?>

<!-- main  -->
<div style="margin-top:20px;margin-bottom:20px;" class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h3>التسجيل في المدونة</h3>
        <form name="Register" id="reg" action="sign_up.php" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td><label class="form-label">الاسم:</label></td>
                    <td><input class="form-control" id="name" type="text" name="user_name" placeholder="الاسم الأول واللقب" autofocus></td>
                    <td>
                        <pre> * </pre>
                    </td>
                    <td style="color: red;">
                        <?php echo $E_user_name; ?>
                    </td>
                </tr>
                <tr>
                    <td><label>كلمة المرور:</label></td>
                    <td><input class="form-control" id="pass" type="password" name="user_password1" placeholder="يجب أن لا تقل كلمة المرور عن 8 حروف وتتكون من رموز وأحرف كبيرة وصغيرة"></td>
                    <td>
                        <pre> * </pre>
                    </td>
                    <td style="color: red;">
                        <?php echo $E_password1; ?>
                    </td>
                </tr>
                <tr>
                    <td><label>تأكيد كلمة المرور:</label></td>
                    <td><input class="form-control" id="pass1" type="password" name="user_password2"></td>
                    <td>
                        <pre> *</pre>
                    </td>
                    <td style="color: red;">
                        <?php echo $E_password2;
                        echo $E_eq; ?>
                    </td>
                </tr>
                <tr>
                    <td><label>البريد الإلكتروني:</label></td>
                    <td><input class="form-control" id="email" type="email" name="user_email"></td>
                    <td>
                        <pre> *</pre>
                    </td>
                    <td style="color: red;">
                        <?php echo $E_email; ?>
                    </td>
                </tr>
                <tr>
                    <td><label>رقم الهاتف:</label></td>
                    <td><input class="form-control" id="tel" type="tel" name="user_tel" placeholder="يجب أن يكون من 9 أرقام"></td>
                    <td>
                        <pre> *</pre>
                    </td>
                    <td style="color: red;">
                        <?php echo $E_phone; ?>
                    </td>
                </tr>
                <tr>
                    <td><label>الجنس:</label></td>
                    <td>
                        <input class="form-check-input" id="gender" type="radio" name="user_gender" value="Male">ذكر
                        <input class="form-check-input" id="gender" type="radio" name="user_gender" value="Female">أنثى
                    </td>
                    <td>
                        <pre> *</pre>
                    </td>
                    <td style="color: red;">
                        <?php echo $E_gender; ?>
                    </td>
                </tr>
                <tr>
                    <td><label>الدولة:</label></td>
                    <td><select name="user_country" id="country">
                            <option value="w">اختر دولتك</option>
                            <option value="Yemen">اليمن</option>
                            <option value="China">الصين</option>
                            <option value="KSA">السعودية</option>
                        </select></td>
                    <td>
                        <pre> *</pre>
                    </td>
                    <td style="color: red;">
                        <?php echo $E_country; ?>
                    </td>
                </tr>
                <tr>
                    <td>رفع صورة:</td>
                    <td><label id="format"><input class="form-control" type="file" id="user_img" name="user_upload" onchange="checkImg();">
                            صيغ الصور المسموحة (jpg,png,svg,jpeg)</label></td>
                </tr>
                <tr>
                    <td><label class="form-check-label">الموافقة:</label> </td>
                    <td><input class="form-check-input" type="checkbox" name="agree" onclick="theChecker();">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="submit" value="تسجيل" name="ok">
                    </td>
                </tr>
            </table>
        </form>

    </div>
    <div class="col-md-2"></div>
</div>
<?php
require_once('footer.php');
?>