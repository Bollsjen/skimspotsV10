<?php
session_start();

use App\routes\Web;
use App\routes\API;


if(!str_starts_with($_SERVER['REQUEST_URI'], '/api/')){
    $web = new Web();
    $web::init();
}else{
    $api = new API();
    $api::init();
}