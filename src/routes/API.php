<?php

namespace App\routes;

use App\routes\Router;
use App\http\API\Controllers\SpotsController;
use App\http\API\Controllers\CountryController;
use App\http\API\Controllers\TestController;
use App\http\API\Controllers\NotFound;

class API{
    static function init(){
        Router::get('/api/Spot', SpotsController::class . '::GetAll');
        Router::get('/api/Country', CountryController::class . '::index');
        Router::post('/api/Country', CountryController::class . '::onPost');

        Router::get('/api/test', TestController::class . '::onGet');
        Router::post('/api/test', TestController::class . '::onPost');
        Router::put('/api/test', TestController::class . '::onPut');
        Router::delete('/api/test', TestController::class . '::onDelete');

        Router::addNotFoundHandler(function($param){
            $notFound = new NotFound();
            $notFound->index($param);
        });

        Router::run();
    }
}