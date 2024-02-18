<?php
require_once('header.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Comments</h1>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Comment</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once('../config.php');
        $sql = "SELECT * FROM contact_us ORDER BY cont_id DESC";
        $exe = mysqli_query($conn, $sql);
        if (!$exe) {
          echo ("Selected Erorr" . mysqli_error($conn));
        }
        while ($row = mysqli_fetch_assoc($exe)) {
          $id = $row['cont_id'];
          $name = $row['cont_user_name'];
          $email = $row['cont_user_email'];
          $text = $row['cont_user_text'];
          echo "
        <tr>
          <td>$id</td>
          <td>$name</td>
          <td>$email</td>
          <td>$text</td>
        </tr>
      ";
        }
        mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </div>
</main>
<!-- end main  -->
<?php
require_once('footer.php');
?>