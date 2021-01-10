<?php

require_once 'config.php';

$festivals = Festival::findAll();
$closestThree = Festival::sortLimitOffsetAsc("start_date", 3, 0);
$closestFourth = Festival::sortLimitOffsetAsc("start_date", 1, 3);
$closestFifth = Festival::sortLimitOffsetAsc("start_date", 1, 4);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Music festivals</title>

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"/>

      <!-- Material Icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/mystyle.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/fonts.css" rel="stylesheet">
  </head>
  <body>
      <?php require 'include/navbar.php'; ?>
      <main role="main">
          <section class="jumbotron myJumbotron mt-5">
              <div class="container-fluid myFluidContainer">
                  <div class="row">
                      <div class="col-lg-8 col-md-12 col-sm-12">
                          <h1 class="lato-regular heroText d-none d-xl-block">The <span class="lato-bold heroHover">Bass</span><br>In your <span class="lato-bold heroHover">Face</span></h1>
                          <div class="myHeroMask">
                              <div class="myHero"></div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-sm-12 d-none d-lg-block">
                          <img class="turntableArm" src="<?= APP_URL ?>/assets/img/arm.png">
                          <div class="card heroCardBG d-flex">
                              <div class="heroCard d-flex flex-column justify-content-center">
                                  <p class="lead lato-bold text-center heroCardText">You wanna feel that <a href="#festivalBrowser" class="heroCardLink"><span class="heroCardTextHighlight">rumble?</span></a></p>
                                  <img src="<?= APP_URL ?>/assets/img/bigVinyl.png" class="vinylHero align-self-center">
                                  <a href="#closestFestivals" class="btn btn-primary redButton">Closest Festivals</a>
                                  <a href="#festivalBrowser" class="btn btn-secondary greyButton">Festival Browser</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      <div class="container">
        <div>
        <h2 class="rowHeading mt-4 mb-2" id="closestFestivals">The 5 Closest Upcoming Festivals</h2>
        <div class="row">
            <?php foreach ($closestThree as $festival) { ?>
            <div class="col-4 mb-4">
              <div class="card myCard imageCard shadow-sm">
                  <a href="#" class="lato-light cardTitle"><?= $festival->title ?></a>
                  <?php try {
                      $image = Image::findById($festival->image_id);
                  } catch (Exception $e) {

                  }
                  if ($image !== null){
                      ?>
                      <img src="<?= APP_URL . "/" . $image->filename ?>" alt="image" class="cardImageLandscape" />
                      <?php
                  }
                  ?>
                <div class="card-body">
                  <p class="card-text"><?= get_words($festival->description, 20) ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <small> Location: </small> <span class="text-muted"><?= $festival->location ?></span>
                    </li>
                    <li class="list-group-item">
                        <small> Start date: </small> <span class="text-muted"><?= $festival->start_date ?></span>
                    </li>
                    <li class="list-group-item">
                        <small> End date: </small><span class="text-muted"><?= $festival->end_date ?></span>
                    </li>
                </ul>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="row">
            <?php foreach ($closestFourth as $festival) { ?>
                <div class="col-8 mb-4">
                    <div class="card myCard imageCard shadow-sm" style="height: 521px">
                        <a href="#" class="lato-light cardTitle"><?= $festival->title ?></a>
                        <?php try {
                            $image = Image::findById($festival->image_id);
                        } catch (Exception $e) {

                        }
                        if ($image !== null){
                            ?>
                            <img src="<?= APP_URL . "/" . $image->filename ?>" alt="image" class="cardImageLandscape"/>
                            <?php
                        }
                        ?>
                        <div class="card-body">
                            <p class="card-text"><?= get_words($festival->description, 20) ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <small> Location: </small> <span class="text-muted"><?= $festival->location ?></span>
                            </li>
                            <li class="list-group-item">
                                <small> Start date: </small> <span class="text-muted"><?= $festival->start_date ?></span>
                            </li>
                            <li class="list-group-item">
                                <small> End date: </small><span class="text-muted"><?= $festival->end_date ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
            <?php foreach ($closestFifth as $festival) { ?>
                <div class="col-4 mb-4">
                    <div class="card myCard imageCard shadow-sm">
                        <a href="#" class="lato-light cardTitle"><?= $festival->title ?></a>
                        <?php try {
                            $image = Image::findById($festival->image_id);
                        } catch (Exception $e) {

                        }
                        if ($image !== null){
                            ?>
                            <img src="<?= APP_URL . "/" . $image->filename ?>" alt="image" class="cardImageLandscape"/>
                            <?php
                        }
                        ?>
                        <div class="card-body">
                            <p class="card-text"><?= get_words($festival->description, 20) ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <small> Location: </small> <span class="text-muted"><?= $festival->location ?></span>
                            </li>
                            <li class="list-group-item">
                                <small> Start date: </small> <span class="text-muted"><?= $festival->start_date ?></span>
                            </li>
                            <li class="list-group-item">
                                <small> End date: </small><span class="text-muted"><?= $festival->end_date ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
            <h2 class="rowHeading mt-3 mb-2" id="festivalBrowser">Festival Browser</h2>
            <div class="row">
                <div class="container-fluid table-responsive">
                    <table class="table table-hover">
                        <thead class="tableHead">
                        <tr>
                            <th scope="col" class="tableHeadCol"><a href="#sort1" class="tableHeadLink">Festival</a></th>
                            <th scope="col" class="tableHeadCol"><a href="#sort2" class="tableHeadLink">Location</a></th>
                            <th scope="col" class="tableHeadCol"><a href="#sort3" class="tableHeadLink">Start Date</a></th>
                            <th scope="col" class="tableHeadCol"><a href="#sort4" class="tableHeadLink">End Date</a></th>
                            <th scope="col" class="tableHeadLink tableHeadCol" style="user-select: none;">Buy</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($festivals as $festival) { ?>
                                <tr>
                                    <th scope="row"><a href="#" class="tableLink"><?= $festival->title ?></a></th>
                                    <td><?= $festival->location ?></td>
                                    <td><?= $festival->start_date ?></td>
                                    <td><?= $festival->end_date ?></td>
                                    <td><button class="btn text-white purchaseButton" id="purchaseButton">+</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
