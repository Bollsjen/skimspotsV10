<?php
spl_autoload_register('autoloader');

function autoloader($className){
    $path = __DIR__ . "/../skimspots/src/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;
    $fullPath = str_replace("\\","/",$fullPath);

    if(!file_exists($fullPath)){
        echo $fullPath;
        return false;
    }

    include_once $fullPath;
}