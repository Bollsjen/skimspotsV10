<?php

namespace App\http\Web\Controllers;

use App\http\Web\Controllers\BaseController;

class NotFoundController extends BaseController {
    
    public function index($params){
        $data = $params;
        $this->view("404/NotFound", $data);
    }

}