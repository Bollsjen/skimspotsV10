<?php

namespace App\models;

class SpotImage{
    public int $id;
    public string $image = "";

    public function __construct(int $id, string $image)
    {
        $this->id = $id;
        $this->image = $image;
    }    

    public function ID() : int {
        return $this->id;
    }

    public function Image() : string {
        return $this->image;
    }
    


    public function SetImage(string $image){
        $this->image = $image;
    }

}