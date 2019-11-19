<?php

require '../config/dev.php';
require '../config/Autoloader.php';
\App\config\Autoloader::register();

try{
    if(isset($_GET['route']))
    {
        if($_GET['route'] === "post"){
            $postId = $_GET['postId'];
            require '../templates/single.php';
        }
        else{
            echo 'page inconnue';
        }
    }
    else{
        require '../templates/home.php';
    }
}
catch (Exception $e)
{
    echo 'erreur';
}