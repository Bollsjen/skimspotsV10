<?php

namespace App\models;

class Continent{
    public int $id;
    public string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function ID() : int {
        return $this->id;
    }

    public function Name() : string {
        return $this->name;
    }





    public function SetName(string $name){
        $this->name = $name;
    }
}