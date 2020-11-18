<?php
require_once 'config.php';

if (!$request->is_logged_in()) {
  $request->redirect("/login-form.php");
}
?>
<?php
try{
    $festivals = Festival::findAll();
}
catch (Exception $ex) {
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");
    $festivals = [];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form validation example</title>

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php require 'include/header.php'; ?>
      <?php require 'include/navbar.php'; ?>
      <?php require "include/flash.php"; ?>
      <main role="main">
        <h1>Home</h1>
        <p>Welcome, <?= $request->session()->get("name") ?>. This is your home page!</p>
        <div class="row">
            <div class="col table-responsive">
            <h1>Festival Browser</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Contact Name</th>
                    <th>Contact Email</th>
                    <th>Contact Phone</th>
                    <th>Image ID</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($festivals as $festival) { ?>
                    <tr>
                      <td><input type="radio" name="customer_id" value="<?= $festival->id ?>" /></ </td>
                      <td><?= $festival->title ?></td>
                      <td><?= substr($festival->description, 0, 30) ?></td>
                      <td><?= $festival->location ?></td>
                      <td><?= $festival->start_date ?></td>
                      <td><?= $festival->end_date ?></td>
                      <td><?= $festival->contact_name ?></td>
                      <td><?= $festival->contact_email ?></td>
                      <td><?= $festival->contact_phone ?></td>
                        <td>
                            <?php
                            try {
                                $image = Image::findById($festival->image_id);
                            } catch (Exception $e) {
                            }
                            if ($image !== null){
                                ?>
                                <img src="<?= APP_URL . "/" . $image->filename ?>" width="50px" alt="image" />
                                <?php
                            }
                            ?>
                        </td>                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
