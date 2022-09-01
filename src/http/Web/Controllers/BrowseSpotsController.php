<?php

namespace App\http\Web\Controllers;

use App\datatypes\DataList;
use App\http\Web\Controllers\BaseController;
use App\http\Web\Models\CardModel;
use App\services\CountryService;

class BrowseSpotsController extends BaseController{
    private $_countryService;

    public function __construct()
    {
        $this->_countryService = new CountryService();
    }

    public function index($params){
        $data = $params;
        if(count($params) < 2){            
            $data['spots'] = $this->GetSpots("SELECT skimspots.ID as spotID, skimspots.Title as Title, skimspots.Views as Views, 
            skimspots.Description as Description, skimspots.Longtitude as Longtitude, skimspots.Latitude as Latitude, skimspots.Added as Added, (SUM(spot_ratings.Rating) / COUNT(spot_ratings.ID)) AS Rating, 
            states.ID as stateID, states.code as stateCode, states.name as stateName,
            spot_types.ID as typeID, spot_types.Type as spotType,
            countries.ID as CountryID, countries.Code as countryCode, countries.Country as Country, countries.Continent as Continent, countries.Phone as Phonecode 
            FROM skimspots
            JOIN spot_types ON skimspots.Type_ID = spot_types.ID 
            JOIN countries ON skimspots.Country_ID = countries.ID
            LEFT OUTER JOIN states ON states.Country_ID = countries.ID
            LEFT JOIN spot_ratings ON skimspots.ID = spot_ratings.Spot_ID 
            GROUP BY skimspots.ID 
            ORDER BY Rating DESC
            LIMIT 15");

            $data['countries'] = $this->_countryService->GetAll("SELECT countries.ID, countries.Code, countries.Country, countries.Phone, countries.Continent FROM countries
            JOIN skimspots ON skimspots.Country_ID = countries.ID
            GROUP BY countries.ID
            ORDER BY countries.Country");

            $this->view("browse-spots/Browse", $data);
        }else{            
            $data['spots'] = $this->GetSpotsWithSort($params);

            $data['countries'] = $this->_countryService->GetAll("SELECT countries.ID, countries.Code, countries.Country, countries.Phone, countries.Continent FROM countries
            JOIN skimspots ON skimspots.Country_ID = countries.ID
            GROUP BY countries.ID
            ORDER BY countries.Country");

            $this->view("browse-spots/Browse", $data);
        }
    }

    public function post($params){
        $data = $params;
        $data['spots'] = $this->GetSpotsWithSort($params);

        $data['countries'] = $this->_countryService->GetAll("SELECT countries.ID, countries.Code, countries.Country, countries.Phone, countries.Continent FROM countries
        JOIN skimspots ON skimspots.Country_ID = countries.ID
        GROUP BY countries.ID
        ORDER BY countries.Country");

        $this->view("browse-spots/Browse", $data);
    }
}