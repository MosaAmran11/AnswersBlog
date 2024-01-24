<?php
require_once('header.php');
require_once('nav.php');
?>

<!-- main  -->
<div class="row">
    <div class="containar">
        <div style="margin-top: 20px; margin-bottom: 20px" class="row">
            <section class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item" aria-current="true">
                                أخبار تقنية
                            </li>
                            <li class="list-group-item active">مشاكل وحلول</li>
                            <li class="list-group-item">تطبيقات</li>
                            <li class="list-group-item">أنظمة تشغيل</li>
                            <li class="list-group-item">ويب</li>
                        </ul>
                    </div>
                </div>
                <div style="margin-top: 20px" class="row">
                    <div class="col-md-12">
                        <form action="result.php" method="GET">
                            <input style="margin-bottom: 10px" name="find" placeholder="اكتب هنا للبحث..." class="form-control" type="text" />
                            <input type="submit" name="sub_find" class="form-control btn btn-success" value="بحث" />
                        </form>
                    </div>
                </div>
                <div style="margin-top: 20px" class="row">
                    <div class="col-md-12">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fanswer.tech1&tabs=timeline&width=278&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="278" height="500" style="border: none; overflow: hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
            </section>
            <main class="col-8">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <!-- Post Type -->
                                <strong class="d-inline-block mb-2 text-primary">أخبار تقنية</strong>
                                <!-- Post Tilte -->
                                <h3 class="mb-0">ساعة أونور MagicWatch 2 الجديدة</h3>
                                <!-- Post Date -->
                                <div class="mb-1 text-muted">27 نوفمبر 2019</div>
                                <!-- Post Description -->
                                <p class="card-text mb-auto">
                                    صورة لساعة أونور MagicWatch 2 أعلنت شركة أونور التابعه
                                    لشركة هواوي عن العديد من الأجهزة بما في ذلك هواتف V30 و
                                    V30 Pro، و الكمبيوتر ا...
                                </p>
                                <a href="#" class="stretched-link">قراءة المزيد</a>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c" />
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                                        Thumbnail
                                    </text>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<?php
require_once('footer.php');
?>