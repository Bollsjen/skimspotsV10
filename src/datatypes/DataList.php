<?php

namespace App\datatypes;

use Iterator;
use FFI\Exception;

class DataList implements Iterator {
    private $list = array();

    private $position = 0;

    public function __construct() { 
        $this->position = 0;
    }

    public function Add($object){
        if($this->Length() > 0){
            if(gettype($this->list[0]) == gettype($object)){
                array_push($this->list, $object);
            }else{
                throw new Exception("The type you has to be of same type as the already added items");
            }
        }else{
            array_push($this->list, $object);
        }
    }

    public function GetAt($key){
        try{
            if($key <= $this->Length()-1){
                return $this->list[$key];
            }
        }catch(Exception){
            throw new Exception("Key is out of bounds");
        }
    }

    public function RemoveAt($key){
        if($key <= $this->Length()-1){
            unset($this->list[$key]);
        }else{
            throw new Exception("Key is out of range");
        }
    }

    public function Remove($object){
        if(($key = array_search($object, $this->list)) !== false){
            unset($this->list[$key]);
        }else{
            throw new Exception("Object was not found in the list");
        }
    }

    public function Clear(){
        unset($this->list);
    }

    public function Length(){
        return count($this->list);
    }



    

    public function rewind(): void {
        //var_dump(__METHOD__);
        $this->position = 0;
    }

    #[\ReturnTypeWillChange]
    public function current(){
        //var_dump(__METHOD__);
        return $this->list[$this->position];
    }

    #[\ReturnTypeWillChange]
    public function key(){
        //var_dump(__METHOD__);
        return $this->position;
    }

    public function next(): void {
        //var_dump(__METHOD__);
        ++$this->position;
    }

    public function valid(): bool {
        //var_dump(__METHOD__);
        return isset($this->list[$this->position]);
    }
}