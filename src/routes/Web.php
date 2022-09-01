<?php

namespace App\routes;

use App\routes\Router;

use App\http\Web\Controllers\HomeController;
use App\http\Web\Controllers\AboutController;
//use App\http\Web\Controllers\ImportSpots;
use App\http\Web\Controllers\BrowseSpotsController;
use App\http\Web\Controllers\SpotController;
use App\http\Web\Controllers\NotFoundController;
use App\http\Web\Controllers\SearchController;
use App\http\Web\Controllers\AddSpotController;
use App\http\Web\Controllers\EditSpotController;

class Web{
    static function init(){
        Router::get('/', HomeController::class . '::index');
        Router::get('/about', AboutController::class . '::index');
        Router::get("/browse-spots", BrowseSpotsController::class . '::index');
        Router::post("/browse-spots", BrowseSpotsController::class . '::post');
        
        Router::get("/spot", SpotController::class . '::index');
        Router::post("/search", SearchController::class . '::index');

        Router::get("/add-spot", AddSpotController::class . '::onGet');
        Router::post("/add-spot", AddSpotController::class . '::onPost');
        Router::get("/edit-spot", EditSpotController::class . '::onGet');

        //Router::get("/import-spots/", ImportSpots::class . '::index');
        //Router::get("/import-images/", ImportSpots::class . '::images');

        Router::addNotFoundHandler(function($param){
            $notFound = new NotFoundController();
            $notFound->index($param);
        });

        Router::run();
    }
}