<?php

namespace App\http\Web\Controllers;

use App\http\Web\Controllers\BaseController;

class SearchController extends BaseController {
    public function index($params){
        if(!isset($params['search'])){
            $params['no'] = "Fisketis";
            $this->view("Search", $params);
            return;
        }

        $search = $params['search'];

        while(substr($search, -1) == " "){
            $search = substr_replace($search, "", -1);
        }

        $params['spots'] = $this->GetSearchSpots($search);
        
        $this->view("Search", $params);
    }
}