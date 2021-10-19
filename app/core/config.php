<?php

define("WEBSITE_TITLE", 'MY SHOP');

if ($_SERVER['SERVER_NAME'] == "localhost") {

    define('DB_NAME', "eshop_db");
    define('DB_USER', "root");
    define('DB_PASS', "");
    define('DB_TYPE', "mysql");
    define('DB_HOST', "localhost");
} else {

    define('DB_NAME', "id17791162_eshop_db");
    define('DB_USER', "id17791162_root");
    define('DB_PASS', "!=U(F-B7?=Z|Eh99");
    define('DB_TYPE', "mysql");
    define('DB_HOST', "localhost");
}

define('THEME', 'eshop/');

define('DEBUG', true);

if (DEBUG) {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}
