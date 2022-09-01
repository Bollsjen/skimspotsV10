<?php

namespace App\services;

use App\database\DBConnection;
use App\datatypes\DataList;
use App\models\Country;

use PDOException;

class CountryService extends DBConnection {

    public function GetContinentByCountryShortName(string $shortName) : string {
        $query = "SELECT * FROM countries WHERE Code = ?";

        try{
            $stmt = $this->Connection()->prepare($query);
            $stmt->execute([$shortName]);
            $result = $stmt->fetchAll();
        }catch(PDOException $e){
            return "PDO ERROR";
        }

        foreach($result as $row){
            return $row['Continent'];
        }

        return "NO RESULTS";
    }

    public function ShortNameToContientAray() : array{
        $query = "SELECT * FROM countries";

        try{
            $stmt = $this->Connection()->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch(PDOException $e){
            return ["ERROR" => "PDO"];
        }
        $array = [];
        foreach($result as $row){
            $array[$row['Code']] = $row['Continent'];
        }



        return $array;
    }

    public function GetAll(string $query) : DataList{
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
            $country = new Country($row['ID'], $row['Code'], $row['Country'], $row['Phone'], $row['Continent']);
            $list->Add($country);
        }

        return $list;
    }

    public function TextToID(string $name) : int{
        $query = "SELECT * FROM countries WHERE Country LIKE ?";
        try {
            $stmt = $this->Connection()->prepare($query);
            $stmt->execute(["%".$name."%"]);
            $result = $stmt->fetchAll();

            if(count($result) > 0){
                return $result[0]['ID'];
            }else{
                return 0;
            }
        }catch(PDOException $e){
            return -1;
        }
    }
}