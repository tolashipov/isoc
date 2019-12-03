<?php
session_start();
require "inc/class.connectdb.php";

// handle timezone
date_default_timezone_set("Asia/Jerusalem");

// add require to all files in "inc" file
spl_autoload_register(function ($class_name) {
    $f = 'inc/class.' .  strtolower ($class_name) . '.php';
    if(file_exists($f)) {
        require $f;
    }
    else {
        echo "<pre>ERROR: Can not find $f</br>";
        debug_backtrace();
    }
});
