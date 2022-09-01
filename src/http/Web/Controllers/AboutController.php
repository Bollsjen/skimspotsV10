<?php

namespace App\http\Web\Controllers;

use App\http\Web\Controllers\BaseController;

class AboutController extends BaseController {
    public function index(){
        $this->view("About");
    }
}