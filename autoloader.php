<?php
// function to handle script loading
spl_autoload_register(
    function ($className) {

        // replace backslashes with forward slashes
        $filePath = 'src/' . str_replace('\\', '/', $className) . '.php';

        // check if the file exists and load it
        if (file_exists($filePath)) {

            include $filePath;

            return true;
        }

        return false;
    }
);