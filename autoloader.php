<?php
spl_autoload_register(function ($classname) {

    $filePath = 'src/' . str_replace('\\', '/', $classname) . '.php';
    if (file_exists($filePath)) {

        include($filePath);
        return true;
    }

    return false;

});