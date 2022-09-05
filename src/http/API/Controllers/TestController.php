<?php

namespace App\http\API\Controllers;

class TestController {
    public function onGet($params){
        echo "This a get request ";
        print_r($params);
    }

    public function onPost($params){
        echo "This a post request ";
        print_r($params);
    }

    public function onPut($params){
        echo "This a put request ";
        print_r($params);
    }

    public function onDelete($params){
        echo "This a delete request ";
        print_r($params);
    }
}