<?php

namespace App\database;

use PDO;

class DBConnection{
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "skimspots_local";

    public static function Connection(){
        $con = new PDO("mysql:host=".DBConnection::$host.";dbname=".DBConnection::$database, DBConnection::$username, DBConnection::$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $con;
    }

    public function CustomConnection(string $custDatabase){
        $con = new PDO("mysql:host=".DBConnection::$host.";dbname=".$custDatabase, DBConnection::$username, DBConnection::$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $con;
    }
}