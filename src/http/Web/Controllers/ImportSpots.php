<?php

namespace App\http\Web\Controllers;

use App\http\Web\Controllers\BaseController;
use Exception;
use PDOException;

class ImportSpots extends BaseController {
    public function index(){
        $query = "SELECT * FROM skimspots";
        try {
            $stmt = $this->CustomConnection("skimspots_com_app")->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch(PDOException $e){
            echo "[Import Spots: select spots] ERROR: ".$e->getMessage();
        }

        foreach($result as $row){
            $sql = "INSERT INTO skimspots (Title, Views, Description, Longtitude, Latitude, State_ID, Type_ID, Country_ID, Added) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            try{
                $conSql = "SELECT * FROM countries WHERE Country = ?";
                $conStmt = $this->Connection()->prepare($conSql);
                $conStmt->execute([$row['country']]);
                $conResult = $conStmt->fetchAll();
            }catch(PDOException $e){
                echo "[Import spots: Contries]" . $e->getMessage();
                return;
            }

            $countries = 0;
            $country = 1;
            foreach($conResult as $item){
                if($countries == 0){
                    $country = $item['ID'];
                }else if($countries > 0){
                    echo "[Import spots: contries] no or too many countries was found";
                    return;
                }
                $countries++;
            }
            $type = 0;
            if($row['type'] == "flatland")
            {
                $type = 1;
            }else{
                $type = 2;
            }

            try{
                $stateSql = "SELECT * FROM states WHERE name = ?";
                $stateStmt = $this->Connection()->prepare($stateSql);
                $stateStmt->execute([$row['state']]);
                $stateResult = $stateStmt->fetchAll();
            }catch(PDOException $e){
                echo "[Import spots: States]" . $e->getMessage();
                return;
            }
            $states = 0;
            $state = null;
            foreach($stateResult as $item){
                if($states == 0){
                    $state = $item['ID'];
                }else if($states > 0){
                    echo "[Import spots: states] no or too many states was found";
                    return;
                }
                $states++;
            }

            try{
                $newStmt = $this->Connection()->prepare($sql);
                $newStmt->execute([$row['spotName'], $row['views'], $row['description'], $row['coordinateN'], $row['coordinateE'], $state, $type, $country, $row['added']]);
            }catch(PDOException $e){
                echo "[Import spots: insertion]" . $e->getMessage();
            }
        }
    }

    public function images(){
        $query = "SELECT * FROM spotimages ORDER BY spotID ASC";
        try {
            $stmt = $this->CustomConnection("skimspots_com_app")->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch(PDOException $e){
            echo "[Import Images: selection] ERROR: ".$e->getMessage();
        }
        $control = 0;
        foreach($result as $row){
            if($row['spotID'] != $control)
            $control++;
            if(file_exists(__DIR__ . "/../../../../public/img/spots/".$row['image_name'])){
                try{

                        //$image = $this->ConvertImage($type, $data);

                        //if($image == null)
                        //{
                        //    break;
                        //}

                        $image = $row['image_name'];             
                }catch(Exception $e){
                    echo "[Import Images: convertion] ERROR ". $e->getMessage();
                }
                try{
                    $sql = "INSERT INTO spot_images (Spot_ID, Image) VALUES (?,?)";
                    $imgStmt = $this->Connection()->prepare($sql);
                    $imgStmt->execute([$control, $image]);
                }catch(PDOException $e){
                    echo "[Import Images: insertion] ERROR Control:" . $control . " ID: " . $row['spotID'] . " image_name: " . $row['image_name']. "<br><br>" . $e->getMessage();
                }
            }else{
                echo "Control:" . $control . " ID: " . $row['spotID'] . " image_name: " . __DIR__ . "/../../../../public/img/spots/".$row['image_name']. " Was not found <br><br>";
            }
        }
    }
}