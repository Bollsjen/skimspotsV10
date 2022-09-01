<?php

namespace App\http\Web\Controllers;

use App\http\Web\Controllers\BaseController;

class EditSpot extends BaseController {
    public function index(){
        $this->view("spot/Edit-spot");
    }
}