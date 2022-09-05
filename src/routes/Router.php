<?php

namespace App\routes;

use Exception;

class Router{

    private static array $handlers;
    private static $notFoundHandler;
    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';
    private const METHOD_PUT = 'PUT';
    private const METHOD_DELETE = 'DELETE';

    public static function get(string $path, $handler): void{
        self::addHandler(self::METHOD_GET,$path, $handler);
    }

    public static function post(string $path, $handler): void{
        self::addHandler(self::METHOD_POST,$path, $handler);
    }

    public static function put(string $path, $handler): void {
        self::addHandler(self::METHOD_PUT, $path, $handler);
    }

    public static function delete(string $path, $handler): void {
        self::addHandler(self::METHOD_DELETE, $path, $handler);
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
            if(!empty(self::$notFoundHandler)){
                $callback = self::$notFoundHandler;
                $post_data = file_get_contents("php://input");
                $data = json_decode($post_data);
                foreach($data as $key => $value){
                    $array[$key] = $value;
                }
                call_user_func_array($callback, [
                    array_merge($_GET, $_POST, $_FILES, $array)
                ]);
            }
        }else{
            $raw_data = file_get_contents("php://input");
            if($method == "onDelete" || $method == "onPut"){
                //$array = self::RetrievePutAndDeleteData($raw_data);
                $data = json_decode($raw_data);
            
                foreach($data as $key => $value){
                    $array[$key] = $value;
                }
            }           
        }
        call_user_func_array($callback, [
            array_merge($_GET, $_POST, $_FILES, $array)//, $array)
        ]);
    }

    /*private static function RetrievePutAndDeleteData($raw_data) : array{
        $boundary = substr($raw_data, 0, strpos($raw_data, "\r\n"));

            // Fetch each part
            $parts = array_slice(explode($boundary, $raw_data), 1);

            $data = array();

            foreach ($parts as $part) {
                // If this is the last part, break
                if ($part == "--\r\n") break; 
            
                // Separate content from headers
                $part = ltrim($part, "\r\n");
                list($raw_headers, $body) = explode("\r\n\r\n", $part, 2);
            
                // Parse the headers list
                $raw_headers = explode("\r\n", $raw_headers);
                $headers = array();
                foreach ($raw_headers as $header) {
                    list($name, $value) = explode(':', $header);
                    $headers[strtolower($name)] = ltrim($value, ' '); 
                } 
            
                // Parse the Content-Disposition to get the field name, etc.
                if (isset($headers['content-disposition'])) {
                    $filename = null;
                    preg_match(
                        '/^(.+); *name="([^"]+)"(; *filename="([^"]+)")?/', 
                        $headers['content-disposition'], 
                        $matches
                    );
                    list(, $type, $name) = $matches;
                    isset($matches[4]) and $filename = $matches[4]; 
            
                    // handle your fields here
                    switch ($name) {
                        // this is a file upload
                        case 'userfile':
                             file_put_contents($filename, $body);
                             break;
            
                        // default for all other files is to populate $data
                        default: 
                             $data[$name] = substr($body, 0, strlen($body) - 2);
                             break;
                    } 
                }
            
            }
            return $data;
    }*/

}

/*
if ($_SERVER['REQUEST_METHOD'] === 'PUT') { 
    $myEntireBody = file_get_contents('php://input'); //Be aware that the stream can only be read once
}*/