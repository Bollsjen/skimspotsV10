<?php

namespace App\http\Web\Controllers;

use App\datatypes\DataList;
use App\http\Web\Controllers\BaseController;
use App\http\Web\Models\CardModel;

class HomeController extends BaseController{
    public function index(){
        $data = [];
        $data['newestSpots'] = $this->NewestSpots();
        $data['top6Spots'] = $this->Top6Spots();
        $data['mostVisitedSpots'] = $this->MostVisited();

        $this->view("Home", $data);
    }

    private function NewestSpots() : DataList{
        return $this->GetSpots("SELECT skimspots.ID as spotID, skimspots.Title as Title, skimspots.Views as Views, 
        skimspots.Description as Description, skimspots.Longtitude as Longtitude, skimspots.Latitude as Latitude, skimspots.Added as Added, (SUM(spot_ratings.Rating) / COUNT(spot_ratings.ID)) AS Rating, 
        states.ID as stateID, states.code as stateCode, states.name as stateName,
        spot_types.ID as typeID, spot_types.Type as spotType,
        countries.ID as CountryID, countries.Code as countryCode, countries.Country as Country, countries.Continent as Continent, countries.Phone as Phonecode 
        FROM skimspots 
        LEFT JOIN spot_images ON skimspots.ID = spot_images.Spot_ID 
        JOIN spot_types ON skimspots.Type_ID = spot_types.ID 
        JOIN countries ON skimspots.Country_ID = countries.ID
        LEFT OUTER JOIN states ON states.Country_ID = countries.ID
        LEFT JOIN spot_ratings ON skimspots.ID = spot_ratings.Spot_ID 
        GROUP BY skimspots.ID 
        ORDER BY skimspots.ID 
        DESC LIMIT 3");
    }

    private function Top6Spots() : DataList{
        return $this->GetSpots("SELECT skimspots.ID as spotID, skimspots.Title as Title, skimspots.Views as Views, 
        skimspots.Description as Description, skimspots.Longtitude as Longtitude, skimspots.Latitude as Latitude, skimspots.Added as Added, (SUM(spot_ratings.Rating) / COUNT(spot_ratings.ID)) AS Rating, 
        states.ID as stateID, states.code as stateCode, states.name as stateName,
        spot_types.ID as typeID, spot_types.Type as spotType,
        countries.ID as CountryID, countries.Code as countryCode, countries.Country as Country, countries.Continent as Continent, countries.Phone as Phonecode 
        FROM skimspots 
        LEFT JOIN spot_images ON skimspots.ID = spot_images.Spot_ID 
        JOIN spot_types ON skimspots.Type_ID = spot_types.ID 
        JOIN countries ON skimspots.Country_ID = countries.ID
        LEFT OUTER JOIN states ON states.Country_ID = countries.ID
        LEFT JOIN spot_ratings ON skimspots.ID = spot_ratings.Spot_ID 
        GROUP BY skimspots.ID 
        ORDER BY Rating 
        DESC LIMIT 6;");
    }

    private function MostVisited() : DataList{
        return $this->GetSpots("SELECT skimspots.ID as spotID, skimspots.Title as Title, skimspots.Views as Views, 
        skimspots.Description as Description, skimspots.Longtitude as Longtitude, skimspots.Latitude as Latitude, skimspots.Added as Added, (SUM(spot_ratings.Rating) / COUNT(spot_ratings.ID)) AS Rating, 
        states.ID as stateID, states.code as stateCode, states.name as stateName,
        spot_types.ID as typeID, spot_types.Type as spotType,
        countries.ID as CountryID, countries.Code as countryCode, countries.Country as Country, countries.Continent as Continent, countries.Phone as Phonecode 
        FROM skimspots 
        LEFT JOIN spot_images ON skimspots.ID = spot_images.Spot_ID 
        JOIN spot_types ON skimspots.Type_ID = spot_types.ID 
        JOIN countries ON skimspots.Country_ID = countries.ID
        LEFT OUTER JOIN states ON states.Country_ID = countries.ID
        LEFT JOIN spot_ratings ON skimspots.ID = spot_ratings.Spot_ID 
        GROUP BY spotID 
        ORDER BY Views 
        DESC LIMIT 3;");
    }
}