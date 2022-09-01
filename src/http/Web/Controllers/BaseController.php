<?php

namespace App\http\Web\Controllers;

use App\services\SpotService;

class BaseController extends SpotService {

    public function view1($view){
        require_once (__DIR__."/../../../views/_Layout/Header.php");
        if(!file_exists(__DIR__."/../../../views/".$view.".php")){
            require_once (__DIR__."/../../../views/404/NotFound.php");
        }else{
            require_once (__DIR__."/../../../views/".$view.".php");
        }
        require_once (__DIR__."/../../../views/_Layout/Footer.php");
    }

    public function view2($view, $params){
        $data = $params;
        require_once (__DIR__."/../../../views/_Layout/Header.php");
        if(!file_exists(__DIR__."/../../../views/".$view.".php")){
            require_once (__DIR__."/../../../views/404/NotFound.php");
        }else{
            require_once (__DIR__."/../../../views/".$view.".php");
        }
        require_once (__DIR__."/../../../views/_Layout/Footer.php");
    }

    public function __call($method, $arguments)
    {
        if($method == 'view'){
            if(count($arguments) == 1){
                return call_user_func_array(array($this, 'view1'), $arguments);
            }else if(count($arguments) == 2){
                return call_user_func_array(array($this, 'view2'), $arguments);
            }
        }
    }
}