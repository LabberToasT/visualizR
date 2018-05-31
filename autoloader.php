<?php
spl_autoload_register(function ($className) {

    $filePath = 'src/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($filePath)) {

        include $filePath;
        return true;
    }

    return false;

});