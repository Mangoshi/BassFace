<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= APP_URL ?>/index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
            </li>
        </ul>
    </div>
    <div class="mx-auto order-0 navBrand">
        <a href="<?= APP_URL ?>/index.php" class="navbar-brand"><img src="<?= APP_URL ?>/assets/img/vinyl.png" style="padding-right: 10px; padding-bottom: 2px;"><strong class="lato-light">BassFace.Hz</strong></a>
        <button class="navbar-toggler myToggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <?php if (!$request->session()->has("email")) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= APP_URL ?>/login-form.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= APP_URL ?>/register-form.php">Register</a>
            </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= APP_URL ?>/logout.php">Logout</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
