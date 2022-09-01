<?php

namespace App\models;

class SpotType{
    public int $id;
    public string $type;

    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }

    public function __construct1(){
        $this->id = 0;
        $this->type = "";
    }

    public function __construct2(int $id, string $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    public function ID() : int {
        return $this->id;
    }

    public function Type() : string {
        return $this->type;
    }







    public function SetType(string $type){
        $this->type = $type;
    }
}