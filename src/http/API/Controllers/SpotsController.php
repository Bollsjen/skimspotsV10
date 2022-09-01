<?php

namespace App\http\API\Controllers;

use App\services\SpotService;

class SpotsController extends SpotService {
    
    public function GetAll($params){
        if(isset($params['limit']) && isset($params['offset'])){
            //$params['limit'] = $params['limit'] / 10;
            //echo $_REQUEST['uri'];
            if(!is_numeric($params['limit'])){
                if(!is_numeric($params['offset'])){
                    header("HTTP/1.0 415 Parameter has wrong type");
                    exit("Limit and offset has to be numbers");
                }else{
                    header("HTTP/1.0 415 Parameter has wrong type");
                    exit("Limit has to be a number");
                }
            }else if(!is_numeric($params['offset'])){
                header("HTTP/1.0 415 Parameter has wrong type");
                exit("Offset has to be a number");
            }

            $query = "SELECT skimspots.ID as spotID, skimspots.Title as Title, skimspots.Views as Views, 
            skimspots.Description as Description, skimspots.Longtitude as Longtitude, skimspots.Latitude as Latitude, skimspots.Added as Added, (SUM(spot_ratings.Rating) / COUNT(spot_ratings.ID)) AS Rating, 
            states.ID as stateID, states.code as stateCode, states.name as stateName,
            spot_types.ID as typeID, spot_types.Type as spotType,
            countries.ID as CountryID, countries.Code as countryCode, countries.Country as Country, countries.Continent as Continent, countries.Phone as Phonecode 
            FROM skimspots 
            JOIN spot_types ON skimspots.Type_ID = spot_types.ID 
            JOIN countries ON skimspots.Country_ID = countries.ID
            LEFT OUTER JOIN states ON states.Country_ID = countries.ID
            LEFT JOIN spot_ratings ON skimspots.ID = spot_ratings.Spot_ID";
            $error = "";
            if(isset($params['country'])){
                if(!is_numeric($params['country'])){
                    $error = "Parameter has wrong type";
                }else{
                    $query = $query . " WHERE countries.ID = " . $params['country'];
                    if(isset($params['type']) && is_numeric($params['type'])){
                        $query = $query . " AND spot_types.ID = " . $params['type'];
                    }
                }
            }else if(isset($params['type'])){
                if(!is_numeric($params['type'])){
                    $error = "Parameter has wrong type";
                }else{
                    $query = $query . " WHERE spot_types.ID = " . $params['type'];
                }
            }
            $query = $query . " GROUP BY skimspots.ID";
            if(isset($params['spotSorting'])) {
                if(is_numeric($params['spotSorting'])){
                    $error = "Parameter has wrong type";
                }else{
                    if($params['spotSorting'] == "alpha"){
                        $query = $query . " ORDER BY skimspots.Title ASC";
                    }else if ($params['spotSorting'] == "rating"){
                        $query = $query . " ORDER BY Rating DESC";
                    }else if ($params['spotSorting'] == "Mvisits"){
                        $query = $query . " ORDER BY Views DESC";
                    }else if ($params['spotSorting'] == "Lvisits"){
                        $query = $query . " ORDER BY Views ASC";
                    }else{
                        $query = $query . " ORDER BY Rating ASC";
                    }
                }
            }else{
                $query = $query . " ORDER BY Rating DESC";
            }

            if($error != ""){
                header("HTTP/1.0 415 ".$error);
                exit("Parameters has the wrong type");
            }
            $query = $query . " LIMIT ".$params['offset'].",".$params['limit'];
            $spots = $this->GetSpots($query);
            //Konverter DataList (Iterator) til array
            $array = iterator_to_array($spots);
            //Konverter DataList (Iterator) til JSON
            $utf8 = $this->utf8ize($array);
            $json = json_encode($utf8, 16, 512);
            //print_r(json_last_error());
    
            if($json == "" || $json == null){
                header("HTTP/1.0 404 Empty object");
            }else {
                header("Content-Type: application/json;");
                header("HTTP/1.0 200 OK");
                //print_r($query);
                echo $json;
                //arsort($array);
                //var_dump($array);
            }
        }else{
            header("HTTP/1.0 400 Parameters is missing");
            echo "Limit and/or offset is missing (?limit=x&offset=x)";
        }
    }

    private function utf8ize($mixed){
        if(is_array($mixed)){
            foreach($mixed as $key => $value){
                $mixed[$key] = $this->utf8ize($value);
            }
        }else if (is_string($mixed)){
            return utf8_encode($mixed);
        }
        return $mixed;
    }
}