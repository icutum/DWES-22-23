<?php
    namespace Utils;

    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path${file}.php");
    });
?>