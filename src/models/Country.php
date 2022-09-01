<?php

namespace App\models;

use App\models\Continent;

class Country {
    public int $id;
    public string $code;
    public string $name;
    public int $phonecode;
    public string $continent;

    public function __construct(int $id, string $code, string $name, int $phonecode, string $continent)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->phonecode = $phonecode;
        $this->continent = $continent;
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

    public function Phonecode() : int {
        return $this->phonecode;
    }

    public function Continent() : string{
        return $this->continent;
    }





    public function SetCode(string $code){
        $this->code = $code;
    }

    public function SetName(string $name){
        $this->name = $name;
    }

    public function SetPhonecode(int $phonecode){
        $this->phonecode = $phonecode;
    }

    public function SetContinent(string $continent){
        $this->continent = $continent;
    }

    public function __serialize(): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'phonecode' => $this->phonecode,
            'continent' => $this->continent
        ];
    }
}