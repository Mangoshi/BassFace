<?php require_once 'config.php'; ?>
<?php
if ($request->is_logged_in()) {
  $request->redirect("/home.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
    <link href="<?= APP_URL ?>/assets/css/form.css" rel="stylesheet">
  </head>
  <body>
    <div class="container pt-5">
      <?php require 'include/navbar.php'; ?>
      <?php require "include/flash.php"; ?>
      <main role="main" class="pt-5 pl-5 ml-5">
        <h1 class="ml-5 pl-5">Login</h1>
        <form name='login' action="login.php" method="post" class="pl-5 ml-5">

            <label for="email" class="pt-3">Email</label>
            <div class="form-field">
                <input type="text" name="email" id="email" value="<?= old("email") ?>" />
                <span class="error"><?= error("email") ?></span>
            </div>

            <label for="password">Password</label>
            <div class="form-field">
                <input type="password" name="password" id="password" />
                <span class="error"><?= error("password") ?></span>
            </div>

          <div class="form-field">
            <label></label>
            <input type="submit" name="submit" value="Submit" />
          </div>

        </form>
      </main>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
