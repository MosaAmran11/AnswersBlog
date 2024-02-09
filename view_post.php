<?php
require_once('header.php');
require_once('nav.php');
require_once('config.php')
?>

<!-- main  -->
<div class="row">
    <div class="containar">
        <div style="margin-top: 20px; margin-bottom: 20px" class="row">
            <section class="col-md-4">
                <div class="row">
                    <!-- List Group -->
                    <?php
                    require_once('list_group.php');
                    ?>
                </div>
                <div style="margin-top: 20px" class="row">
                    <!-- Search Bar -->
                    <?php
                    require_once('search.php');
                    ?>
                </div>
                <div style="margin-top: 20px" class="row">
                    <!-- IFrame Section -->
                    <?php
                    require_once('iframe.php');
                    ?>
                </div>
            </section>
            <main class="col-8">
                <!-- Retreving data from database -->
                <?php
                require_once('config.php');
                $post_id = $_GET['post_id'];
                $sql = "SELECT * FROM posts WHERE post_id = '{$post_id}'";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Error in SQL query");
                }
                $row = mysqli_fetch_assoc($result);
                $title = $row['post_title'];
                $date = $row['post_date'];
                $text = $row['post_text'];
                $type = $row['post_type'];
                $img = $row['post_img'];
                ?>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <!-- Post Type -->
                                <strong class="d-inline-block mb-2 text-primary"><?php echo $type ?></strong>
                                <!-- Post Thumbnail -->
                                <div class="col-auto d-none d-lg-block">
                                    <div class="post-thumbnail" style="height: auto; margin-bottom: 5px">
                                        <img src="./dashboard/news_uplode/<?php echo $img ?>" alt="" style="width: 100%; border-radius: 8px" />
                                    </div>
                                </div>
                                <!-- Post Tilte -->
                                <h3 class="mb-0"><?php echo $title ?></h3>
                                <!-- Post Date -->
                                <div class="mb-1 text-muted"><?php echo $date ?></div>
                                <!-- Post Text -->
                                <p class="card-text mb-auto"><?php echo $text ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                mysqli_close($conn);
                ?>
            </main>
        </div>
    </div>
</div>
<?php
require_once('footer.php');
?>