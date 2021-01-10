<?php

require_once 'config.php';

if (!$request->is_logged_in())
{
  $request->redirect("/login-form.php");
}

try
{
    $request->session()->forget("flash_data");
    $request->session()->forget("flash_errors");
    $festivals = Festival::findAll();
}
catch (Exception $ex)
{
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
    <title>Festivals Home</title>

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"/>

      <!-- Material Icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
      <link href="<?= APP_URL ?>/assets/css/mystyle.css" rel="stylesheet" />
      <link href="<?= APP_URL ?>/assets/css/fonts.css" rel="stylesheet">

  </head>
  <body>
    <div class="container-fluid">
      <?php require 'include/navbar.php'; ?>
      <?php require "include/flash.php"; ?>
      <main role="main" class="mb-4">
        <div class="row mt-5">
            <div class="col table-responsive mt-4">
                <h3>Home</h3>
                <p>Welcome, <?= $request->session()->get("name") ?>. This is your home page!</p>
                <a class="btn addButton text-white float-right mb-2" id="addButton" href="<?= APP_URL ?>/festival-create.php"><span class="material-icons">add_circle</span> ADD</a>
                <form method="get">
                    <table class="table table-hover">
                <thead class="tableHead">
                  <tr>
                    <th scope="col" class="tableHeadCol"><a href="#sort1" class="tableHeadLink">ID</a></th>
                    <th scope="col" class="tableHeadCol"><a href="#sort2" class="tableHeadLink">Title</a></th>
                    <th scope="col" class="tableHeadCol"><a href="#sort3" class="tableHeadLink">Description</a></th>
                    <th scope="col" class="tableHeadCol"><a href="#sort4" class="tableHeadLink">Location</a></th>
                    <th scope="col" class="tableHeadCol"><a href="#sort5" class="tableHeadLink">Start Date</a></th>
                    <th scope="col" class="tableHeadCol"><a href="#sort6" class="tableHeadLink">End Date</a></th>
                    <th scope="col" class="tableHeadCol"><a href="#sort7" class="tableHeadLink">Name</a></th>
                    <th scope="col" class="tableHeadCol"><a href="#sort8" class="tableHeadLink">Email</a></th>
                    <th scope="col" class="tableHeadCol"><a href="#sort9" class="tableHeadLink">Phone</a></th>
                    <th scope="col" class="tableHeadCol"><a href="#sort10" class="tableHeadLink">Image</a></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($festivals as $festival) { ?>
                    <tr>
                      <td><input type="radio" name="festival_id" value="<?= $festival->id ?>" /></ </td>
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
                <button class="btn viewButton text-white btn-festival" id="viewButton" formaction="<?= APP_URL ?>/festival-view.php"><span class="material-icons">remove_red_eye</span>VIEW</button>
                <button class="btn editButton text-white btn-festival" id="editButton" formaction="<?= APP_URL ?>/festival-edit.php"><span class="material-icons">settings</span> EDIT</button>
                <button class="btn removeButton text-white btn-festival btn-festival-delete" id="removeButton" formaction="<?= APP_URL ?>/festival-delete.php"><span class="material-icons">delete_forever</span> DELETE</button>
                </form>
            </div>
          </div>
      </main>
    </div>
      <?php require 'include/footer.php'; ?>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/selectCheck.js"></script>
  </body>
</html>
