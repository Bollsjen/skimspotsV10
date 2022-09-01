<?php

namespace App\services;

use App\database\DBConnection;
use App\datatypes\DataList;
use App\models\Continent;
use App\models\Country;
use App\models\Spot;
use App\models\SpotImage;
use App\models\SpotType;
use App\models\State;
use DateTime;
use PDOException;

use App\services\CountryService;

class SpotService extends DBConnection {

    public function GetSpot(int $id) : Spot{
        $query = "SELECT skimspots.ID as spotID, skimspots.Title as Title, skimspots.Views as Views, 
        skimspots.Description as Description, skimspots.Longtitude as Longtitude, skimspots.Latitude as Latitude, skimspots.Added as Added, (SUM(spot_ratings.Rating) / COUNT(spot_ratings.ID)) AS Rating, 
        states.ID as stateID, states.code as stateCode, states.name as stateName,
        spot_types.ID as typeID, spot_types.Type as spotType,
        countries.ID as CountryID, countries.Code as countryCode, countries.Country as Country, countries.Continent as Continent, countries.Phone as Phonecode 
        FROM skimspots 
        JOIN spot_types ON skimspots.Type_ID = spot_types.ID 
        JOIN countries ON skimspots.Country_ID = countries.ID
        LEFT OUTER JOIN states ON states.Country_ID = countries.ID
        LEFT JOIN spot_ratings ON skimspots.ID = spot_ratings.Spot_ID 
        WHERE skimspots.ID = ?";

        $spot = null;

        try{
            $stmt = $this->Connection()->prepare($query);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
            
            $result = $result[0];

            $country = new Country($result['CountryID'], $result['countryCode'], $result['Country'], $result['Phonecode'], $result['Continent']);

            if($result['stateID'] == NULL || $result['stateID'] == ""){
                $state = new State(0, "", "", $country);
            }else{
                $state = new State($result['stateID'], $result['stateCode'], $result['stateName'], $country);
            }

            if($result['Rating'] == NULL || $result['Rating'] == ""){
                $rating = 0;
            }else{
                $rating = $result['Rating'];
            }
            $time = \DateTime::createFromFormat('Y-m-d H:i:s', $result['Added']);

            $desc = $result['Description'] == NULL || $result['Description'] == null ? "" : $result['Description'];

            $spot = new Spot($result['spotID'], $result['Title'], $result['Views'], $desc, $result['Longtitude'], $result['Latitude'], $rating, $result['spotType'], $state, $this->GetAllImages($id), $time);

            return $spot;
        }catch(PDOException $e){
            echo "[GetSpot] ERROR: " . $e->getMessage();
        }
    }

    public function GetSpots(string $query) : DataList{
        $list = new DataList();

        try {
            $stmt = $this->Connection()->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch(PDOException $e){
            echo "[GetSpots] ERROR: ".$e->getMessage();
            return $list;
        }

        foreach($result as $row){
            $images = array();
            $country = new Country($row['CountryID'], $row['countryCode'], $row['Country'], $row['Phonecode'], $row['Continent']);
            if($row['stateID'] != null){
                $state = new State($row['stateID'], $row['stateCode'], $row['stateName'], $country);
            }else{
                $state = new State(-1, "NAN", "NAN", $country);
            }

            $images = $this->GetSpotDefaultImage($row['spotID']);

            if($row['Rating'] != null){
                $rating = $row['Rating'];
            }else{
                $rating = 0;
            }

            if($row['Description'] != null){
                $description = $row['Description'];
            }else{
                $description = "";
            }
            $time = \DateTime::createFromFormat('Y-m-d H:i:s', $row['Added']);
            $spot = new Spot($row['spotID'], $row['Title'], $row['Views'], $description, $row['Longtitude'], $row['Latitude'],
            $rating, $row['spotType'], $state, $images, $time);

            $list->Add($spot);
        }
        return $list;
    }

    public function GetSpotsWithSort($params) : DataList{

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
                    $countryService = new CountryService();
                    $params['country'] = $countryService->TextToID($params['country']);
                }
                    $query = $query . " WHERE countries.ID = " . $params['country'];
                    if(isset($params['type']) && is_numeric($params['type'])){
                        $query = $query . " AND spot_types.ID = " . $params['type'];
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
            $query = $query . " LIMIT 0,15";
            $spots = $this->GetSpots($query);
            return $spots;
    }

    private function GetAllImages(int $id){
        $query = "SELECT * FROM spot_images WHERE Spot_ID = ?";
        try{
            $stmt = $this->Connection()->prepare($query);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
            $images = [];
            foreach($result as $row){
                $images[] = (new SpotImage($row['ID'], $row['image']));
            }
            return $images;
        }catch(PDOException $e){
            return null;
        }
    }

    private function GetSpotDefaultImage(int $id){
        $query = "SELECT * FROM spot_images WHERE Spot_ID = ? LIMIT 1";
        try{
            $stmt = $this->Connection()->prepare($query);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
            $images = [];
            $i = 0;
            foreach($result as $row){
                $images[] = (new SpotImage($row['ID'], $row['image']));
                $i++;
            }

            if($i == 0){
                $images[] = (new SpotImage(-1, "/public/img/spots/"));
            }
            return $images;
        }catch(PDOException $e){
            return null;
        }
    }

    public function NearbySpots(int $id) : DataList{
        $mySpot = $this->GetSpot($id);
        $query = "SELECT ID, Longtitude, Latitude FROM skimspots WHERE ID != ?";

        try{
            $stmt = $this->Connection()->prepare($query);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();

            $pi = pi();
            $all_spots = [];

            foreach($result as $row){
                $x = sin($mySpot->Latitude() * $pi / 180) *
                sin(floatval($row['Latitude']) * $pi / 180) +
                cos($mySpot->Latitude() * $pi / 180) *
                cos(floatval($row['Latitude']) * $pi / 180) *
                cos((floatval($row['Longtitude']) * $pi / 180) - ($mySpot->Longtitude() * $pi / 180));

                $x = atan((sqrt(1 - pow($x, 2))) / $x);
                $distance = abs((1.852 * 60 * (($x/$pi) * 180)) / 1.609344);
                array_push($all_spots, ["ID" => intval($row['ID']), "Distance" => $distance]);
            }
            usort($all_spots, function($a, $b){
                if($a["Distance"] == $b["Distance"]) return 0;
                return ($a["Distance"] < $b["Distance"]) ? -1 : 1;
            });
            $list = new DataList();

            for($i = 0; $i < 4; $i++){
                $list->Add($this->GetSpot($all_spots[$i]['ID']));
                $list->GetAt($list->Length()-1)->SetImages($this->GetSpotDefaultImage($all_spots[$i]['ID']));
            }
            return $list;

        }catch(PDOException $e){
            echo $e->getMessage();
            return new DataList();
        }
    }

    public function GetSearchSpots($search) : DataList{
        $list = new DataList();
        $query = "SELECT skimspots.ID as spotID, skimspots.Title as Title, skimspots.Views as Views, 
        skimspots.Description as Description, skimspots.Longtitude as Longtitude, skimspots.Latitude as Latitude, skimspots.Added as Added, (SUM(spot_ratings.Rating) / COUNT(spot_ratings.ID)) AS Rating, 
        states.ID as stateID, states.code as stateCode, states.name as stateName,
        spot_types.ID as typeID, spot_types.Type as spotType,
        countries.ID as CountryID, countries.Code as countryCode, countries.Country as Country, countries.Continent as Continent, countries.Phone as Phonecode 
        FROM skimspots
        JOIN spot_types ON skimspots.Type_ID = spot_types.ID 
        JOIN countries ON skimspots.Country_ID = countries.ID
        LEFT OUTER JOIN states ON states.Country_ID = countries.ID
        LEFT JOIN spot_ratings ON skimspots.ID = spot_ratings.Spot_ID 
        WHERE countries.Country LIKE ? OR countries.Continent LIKE ? OR spot_types.Type LIKE ? OR skimspots.Title LIKE ? OR skimspots.Description LIKE ?";

        $query = $query . " GROUP BY skimspots.ID ";

        $search = "%" . $search . "%";

        $searchArray = [];

        for($i = 0; $i < 5; $i++){
            $searchArray[] = $search;
        }

        try {
            $stmt = $this->Connection()->prepare($query);
            $stmt->execute($searchArray);
            $result = $stmt->fetchAll();
        }catch(PDOException $e){
            echo "[GetSpots] ERROR: ".$e->getMessage();
            return $list;
        }

        foreach($result as $row){
            $images = array();
            $country = new Country($row['CountryID'], $row['countryCode'], $row['Country'], $row['Phonecode'], $row['Continent']);
            if($row['stateID'] != null){
                $state = new State($row['stateID'], $row['stateCode'], $row['stateName'], $country);
            }else{
                $state = new State(-1, "NAN", "NAN", $country);
            }

            $images = $this->GetSpotDefaultImage($row['spotID']);

            if($row['Rating'] != null){
                $rating = $row['Rating'];
            }else{
                $rating = 0;
            }

            if($row['Description'] != null){
                $description = $row['Description'];
            }else{
                $description = "";
            }
            $time = \DateTime::createFromFormat('Y-m-d H:i:s', $row['Added']);
            $spot = new Spot($row['spotID'], $row['Title'], $row['Views'], $description, $row['Longtitude'], $row['Latitude'],
            $rating, $row['spotType'], $state, $images, $time);

            $list->Add($spot);
        }
        return $list;
    }

}
