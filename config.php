<?php
define('APP_URL', 'http://localhost/music-festivals-1-master/');

define('DB_SERVER', 'localhost');
define('DB_DATABASE', 'festivals');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

define('KEY_EXCEPTION', '__EXCEPTION__');

set_include_path(
  get_include_path() . PATH_SEPARATOR . dirname(__FILE__)
);

session_start();

require "lib/global.php";
?>
