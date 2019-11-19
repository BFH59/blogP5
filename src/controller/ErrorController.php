<?php


namespace App\src\controller;


class ErrorController
{
    public function error()
    {
        require '../templates/error.php';
    }

    public function unknown()
    {
        require '../templates/unknown.php';
    }
}