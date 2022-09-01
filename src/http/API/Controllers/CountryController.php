<?php

namespace App\http\API\Controllers;

use App\services\CountryService;

class CountryController extends CountryService {
    public function index($params){
        if(isset($params['shortnameAndContinent'])){
            header("Content-Type: application/json;");
            header("HTTP/1.0 200 OK");
            print_r(json_encode($this->ShortNameToContientAray(), 16,512));
        }else{
            header("HTTP/1.0 400");
            echo "Something was missing";
        }
    }

    public function onPost($params){

    }
}