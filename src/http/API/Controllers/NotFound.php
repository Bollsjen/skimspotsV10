<?php

namespace App\http\API\Controllers;

class NotFound {
    public function index(){
        header("HTTP/1.0 404");
        echo "API call was not found";
    }
}