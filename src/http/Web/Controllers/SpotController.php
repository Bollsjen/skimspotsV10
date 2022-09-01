<?php

namespace App\http\Web\Controllers;

use App\http\Web\Controllers\BaseController;

class SpotController extends BaseController {

    public function index($params){
        $params["spot"] = $this->GetSpot($params["spotID"]);
        $params["nearbySpots"] = $this->NearbySpots($params["spotID"]);
        $this->view("spot/Spot", $params);
    }

}