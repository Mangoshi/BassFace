<?php
require_once 'config.php';

try {
    $rules = [
        'festival_id' => 'present|integer|min:1'
    ];
    $request->validate($rules);
    if (!$request->is_valid()) {
        throw new Exception("Illegal request");
    }
    $festival_id = $request->input('festival_id');
    $festival = Festival::findById($festival_id);
    if ($festival === null) {
        throw new Exception("Illegal request parameter");
        }
    }
    catch (Exception $ex) {
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");

    $request->redirect("/home.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Festival</title>

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"/>

      <!-- Material Icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
      <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
      <link href="<?= APP_URL ?>/assets/css/form.css" rel="stylesheet">

      <!-- My CSS -->
      <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/frontend-only/css/mystyle.css">

  </head>
  <body>
    <div class="container">
      <?php require 'include/header.php'; ?>
      <?php require 'include/navbar.php'; ?>
      <main role="main">
        <div>
          <h3>View Festival</h3>
            <form method="get">

                <div class="form-field" hidden>
                <!--  <input type="hidden" name="festival_id" value="--><?//= $festival->id ?><!--" />-->
                <input type="radio" checked name="festival_id" value="<?= $festival->id ?>" />
                </div>

                <label for="name" class="mt-2">Name</label>
                <div class="form-field">
                    <input type="text" name="name" id="name" value="<?= $festival->title ?>" disabled>
                </div>

                <label for="description" class="mt-2">Description</label>
                <div class="form-field">
                    <textarea name="description" id="description" rows="3" disabled><?= $festival->description ?></textarea>
                </div>

                <label for="location" class="mt-2">Location</label>
                <div class="form-field">
                    <input type="text" name="location" id="location" disabled value="<?= $festival->location ?>" />
                </div>

                <label for="start_date" class="mt-2">Start Date</label>
                <div class="form-field">
                    <input type="date" name="start_date" id="start_date" disabled value="<?= $festival->start_date ?>"</input>
                </div>

                <label for="end_date" class="mt-2">End Date</label>
                <div class="form-field">
                    <input type="date" name="end_date" id="end_date" disabled value="<?= $festival->end_date ?>"</input>
                </div>

                <label for="contact_name" class="mt-2">Contact Name</label>
                <div class="form-field">
                    <input type="text" name="contact_name" id="contact_name" disabled value="<?= $festival->contact_name ?>" />
                </div>

                <label for="contact_email" class="mt-2">Contact Email</label>
                <div class="form-field">
                    <input type="text" name="contact_email" id="contact_email" disabled value="<?= $festival->contact_email ?>" />
                </div>

                <label for="contact_phone" class="mt-2">Contact Phone</label>
                <div class="form-field">
                    <input type="tel" name="contact_phone" id="contact_phone" disabled value="<?= $festival->contact_phone ?>" />
                </div>

                <label for="image_id" class="mt-2">Image</label>
                <div class="form-field">
                    <input type="number" name="image_id" id="image_id" disabled value="<?= $festival->image_id ?>" />
                </div>
                <?php
                try {
                    $image = Image::findById($festival->image_id);
                } catch (Exception $e) {

                }
                if ($image !== null){
                    ?>
                        <img src="<?= APP_URL . "/" . $image->filename ?>" width="205px" alt="image" class="mt-2 mb-2"/>
                    <?php
                }
                    ?>

                <div class="form-field">
                    <label></label>
                    <a class="btn viewButton btn-default text-white" href="<?= APP_URL ?>/home.php">Cancel</a>
                    <button class="btn editButton text-white btn-festival" id="editButton" formaction="<?= APP_URL ?>/festival-edit.php"><span class="material-icons">settings</span> EDIT</button>
                    <button class="btn removeButton text-white btn-festival btn-festival-delete" id="removeButton" formaction="<?= APP_URL ?>/festival-delete.php"><span class="material-icons">delete_forever</span> DELETE</button>
                </div>
            </form>
        </div>
      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/selectCheck.js"></script>
  </body>
</html>
