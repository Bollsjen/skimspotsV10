<?php

namespace App\routes;

class Router{

    private static array $handlers;
    private static $notFoundHandler;
    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';

    public static function get(string $path, $handler): void{
        self::addHandler(self::METHOD_GET,$path, $handler);
    }

    public static function post(string $path, $handler): void{
        self::addHandler(self::METHOD_POST,$path, $handler);
    }

    public static function addNotFoundHandler($handler): void {
        self::$notFoundHandler = $handler;
    }

    private static function addHandler(string $method, string $path, $handler): void{
        self::$handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler,
        ];
    }

    public static function run(){
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        $callback = null;
        //$pathArray = explode('/',$requestPath);
        foreach(self::$handlers as $handler){
            if($handler['path'] === $requestPath && $method === $handler['method']){
                $callback = $handler['handler'];
            } /*else{               
                if(count($pathArray) == 3){
                    if(('/'.$pathArray[1].'/{id}') === $handler['path'] && $method === $handler['method']){
                        $callback = $handler['handler'];
                        $parameter = str_replace("-", " ", $pathArray[2]);
                        $_GET['id'] = $parameter;
                        $_GET['category'] = $pathArray[2];
                    }
                } else if(count($pathArray) == 4){
                    if(('/'.$pathArray[1].'/{id}/{title}') === $handler['path'] && $method === $handler['method']){
                        $callback = $handler['handler'];
                        $id = str_replace("-", " ", $pathArray[2]);
                        $title = str_replace("-", " ", $pathArray[3]);
                        $_GET['id'] = $id;
                        $_GET['category'] = $pathArray[2];
                        $_GET['title'] = $title;
                        $_GET['article'] = $pathArray[3];
                    }
                }
            }*/
        }

        if(is_string($callback)){
            $parts = explode('::', $callback);
            if(is_array($parts)){
                $className = array_shift($parts);
                $handler = new $className;

                $method = array_shift($parts);
                $callback = [$handler, $method];
            }
        }

        if(!$callback || $callback == NULL || $callback == null){
            header("HTTP/1.0 404 Not Found");
            if(!empty(self::$notFoundHandler)){
                $callback = self::$notFoundHandler;
                call_user_func_array($callback, [
                    array_merge($_GET, $_POST, $_FILES)
                ]);
            }
        }else{
            call_user_func_array($callback, [
                array_merge($_GET, $_POST, $_FILES)
            ]);
        }
    }

}

/*
if ($_SERVER['REQUEST_METHOD'] === 'PUT') { 
    $myEntireBody = file_get_contents('php://input'); //Be aware that the stream can only be read once
}*/