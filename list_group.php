<!-- <div class="col-md-12">
    <ul class="list-group">
        <a style="text-decoration: none;" href="">
            <li class="list-group-item active" aria-current="true">
                أخبار تقنية
            </li>
        </a>

        <a style="text-decoration: none;" href="">
            <li class="list-group-item">مشاكل وحلول</li>
        </a>

        <a style="text-decoration: none;" href="">
            <li class="list-group-item">تطبيقات</li>
        </a>

        <a style="text-decoration: none;" href="">
            <li class="list-group-item">أنظمة تشغيل</li>
        </a>

        <a style="text-decoration: none;" href="">
            <li class="list-group-item">ويب</li>
        </a>
    </ul>
</div> -->
<div class="col-md-12">
    <ul class="list-group">
        <?php
        require_once('config.php');
        $sql = "SELECT post_type, post_id FROM posts";
        $result = mysqli_query($conn, $sql);
        $count = 0;
        while ($data = mysqli_fetch_assoc($result)) {
            $type = $data['post_type'];
        ?>
            <a style="text-decoration: none;" href="result.php?find=<?php echo $type; ?>">
                <li class="list-group-item" aria-current="true">
                    <?php echo $type; ?>
                </li>
            </a>
        <?php
            $count++;
        } // end while loop
        ?>
    </ul>
</div>