<?php require_once 'config.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Festival</title>

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
          <h3>Create Festival</h3>
            <form method="post" action="<?= APP_URL ?>/festival-store.php">

                <label for="title" class="mt-2">Name</label>
                <div class="form-field">
                    <input type="text" name="title" id="title" value="<?= old('title') ?>" />
                    <span class="error"><?= error("title") ?></span>
                </div>

                <label for="description" class="mt-2">Description</label>
                <div class="form-field">
                    <textarea name="description" id="description" rows="3"><?= old('description') ?></textarea>
                    <span class="error"><?= error("description") ?></span>
                </div>

                <label for="location" class="mt-2">Location</label>
                <div class="form-field">
                    <input type="text" name="location" id="location" value="<?= old('location') ?>" />
                    <span class="error"><?= error("location") ?></span>
                </div>

                <label for="start_date" class="mt-2">Start Date</label>
                <div class="form-field">
                    <input type="date" name="start_date" id="start_date"  value="<?= old('start_date') ?>"</input>
                    <span class="error"><?= error("start_date") ?></span>
                </div>

                <label for="end_date" class="mt-2">End Date</label>
                <div class="form-field">
                    <input type="date" name="end_date" id="end_date" value="<?= old('end_date') ?>"</input>
                    <span class="error"><?= error("end_date") ?></span>
                </div>

                <label for="contact_name" class="mt-2">Contact Name</label>
                <div class="form-field">
                    <input type="text" name="contact_name" id="contact_name" value="<?= old('contact_name') ?>" />
                    <span class="error"><?= error("contact_name") ?></span>
                </div>

                <label for="contact_email" class="mt-2">Contact Email</label>
                <div class="form-field">
                    <input type="text" name="contact_email" id="contact_email" value="<?= old('contact_email') ?>" />
                    <span class="error"><?= error("contact_email") ?></span>
                </div>

                <label for="contact_phone" class="mt-2">Contact Phone</label>
                <div class="form-field">
                    <input type="tel" name="contact_phone" id="contact_phone" value="<?= old('contact_phone') ?>" />
                    <span class="error"><?= error("contact_phone") ?></span>
                </div>

                <div class="form-field">
                    <label></label>
                    <a class="btn viewButton btn-default text-white" href="<?= APP_URL ?>/home.php">Cancel</a>
                    <button class="btn editButton text-white" id="editButton" type="submit"> <span class="material-icons">note_add</span> STORE</button>
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
