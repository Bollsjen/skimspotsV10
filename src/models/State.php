<?php

namespace App\models;

use App\models\Country;

class State{
    public int $id;
    public string $code;
    public string $name;
    public Country $country;

    public function __construct(int $id, string $code, string $name, Country $country)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->country = $country;
    }

    public function ID() : int {
        return $this->id;
    }

    public function Code() : string {
        return $this->code;
    }

    public function Name() : string {
        return $this->name;
    }

    public function Country() : Country {
        return $this->country;
    }





    public function SetCode(string $code){
        $this->code = $code;
    }

    public function SetName(string $name){
        $this->name = $name;
    }

    public function SetCountry(Country $country){
        $this->country = $country;
    }
}