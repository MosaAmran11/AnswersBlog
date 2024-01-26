<?php
require_once('header.php');
require_once('nav.php');
?>
<!-- main  -->
<div class="row">
    <div class="col-2"></div>
    <div style="padding: 15px;" class="col-8 border rounded overflow-hidden flex-md-row mt-4 shadow-sm h-md-250 position-relative">
        <h1>حول الموقع</h1>
        <?php
        require_once('config.php');
        $sql = "SELECT * FROM about_us ORDER BY about_id DESC";
        $result = @mysqli_query($conn, $sql);
        if (@mysqli_num_rows($result) > 0) {
            $text = mysqli_fetch_assoc($result)['about_text'];
            echo "<p>$text</p>";
            // echo "موقع حلول تكنولوجيا هو عبارة عن مدونة جديدة لتحميل وشرح التطبيقات والألعاب المجانية وعرض جميع المشاكل والحلول الخاصة بالكمبيوتر والجوال بالإضافة إلى تقديم العديد من الشروحات المُصوَّرة والتي يبحث عنها جميع المستخدمين في الوطن العربي. \nبرجاء زيارة صفحة اتصل بنا للتواصل والاقتراحات في تطوير الموقع.";
        } else {
            echo "Error Selection!";
            // echo "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus nulla ad eos similique, laboriosam impedit provident earum commodi neque perferendis magni animi perspiciatis eligendi atque. Consequuntur molestias ea itaque inventore? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo ullam et voluptatum labore, iste corrupti, porro enim deleniti tempora recusandae error obcaecati in quam facere necessitatibus amet officia praesentium animi?";
        }
        ?>
    </div>
    <div class="col-2"></div>
</div>
<?php
require_once('footer.php');
?>