<?php

namespace App\models;

use DateTime;
use App\datatypes\DataList;
use App\models\Country;
use App\models\SpotType;
use App\models\State;

class Spot {
    public int $id;
    public string $title;
    public int $views = 0;
    public string $description;
    public float $longtitude;
    public float $latitude;
    public float $rating;
    public State $state;
    public string $type;
    public $images = array();
    public DateTime $added;

    public function __construct(int $id, string $title, int $views, string $description, float $longtitude, float $latitude, float $rating, string $type, State $state, array $images, DateTime $added)
    {
        $this->id = $id;
        $this->title = $title;
        $this->views = $views;
        $this->description = $description;
        $this->longtitude = $longtitude;
        $this->latitude = $latitude;
        $this->rating = $rating;
        $this->type = $type;
        $this->state = $state;
        $this->images = $images;
        $this->added = $added;
    }

    public function ID() : int {
        return $this->id;
    }

    public function Title() : string {
        return $this->title;
    }

    public function Views() : int{
        return $this->views;
    }

    public function Description() : string {
        return $this->description;
    }

    public function Longtitude() : float {
        return $this->longtitude;
    }

    public function Latitude() : float {
        return $this->latitude;
    }

    public function Rating() : float {
        return $this->rating;
    }

    public function Country() : Country {
        return $this->state->Country();
    }

    public function Type() : string{
        return $this->type;
    }

    public function State() : State{
        return $this->state;
    }

    public function Images() : array {
        return $this->images;
    }

    public function Added() : DateTime {
        return $this->added;
    }






    public function SetTitle(string $title){
        $this->title = $title;
    }

    public function SetViews(int $views){
        $this->views = $views;
    }

    public function SetDescription(string $description){
        $this->description = $description;
    }

    public function SetLongtitude(float $longtitude){
        $this->longtitude = $longtitude;
    }

    public function SetLatitude(float $latitude){
        $this->latitude = $latitude;
    }

    public function SetRating(float $rating){
        $this->rating = $rating;
    }

    public function SetCountry(Country $country){
        $this->state->SetCountry($country);
    }

    public function SetType(string $type){
        $this->type = $type;
    }

    public function SetState(State $state){
        $this->state = $state;
    }

    public function SetImages(array $images){
        $this->images = $images;
    }
}