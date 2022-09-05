<?php

namespace App\http\Web\Controllers;

use App\http\Web\Controllers\BaseController;
require(__DIR__."/../../../../_secrets/SecretStuff.php");

class AddSpotController extends BaseController {
    public function onGet($params){
        if(count($params) < 2){
            $this->view("spot/Add-spot");
        }else if(isset($params['map'])){
            $this->getMapScript();
        }else if(isset($params['geocode'])){
            if(isset($params['latitude']) && isset($params['longtitude'])){
                $this->getGeocodeData($params['latitude'], $params['longtitude']);
            }
        }
    }

    public function onPost($params){
        if(isset($params['img-file'])){
            $this->handleImage($params['img-file']);
        }
    }

    public function onPut($params){
        echo "This a put request ";
        print_r($params);
    }

    public function onDelete($params){
        echo "This a delete request ";
        print_r($params);
    }

    private function handleImage($file){
        $phpFileUploadErrors = array(
            0 => 'Ingen fejl, billede er uploadet',
            1 => 'Den uploadede fil overskrider upload_max_filesize direktivet i php.ini',
            2 => 'Den uploadede fil overskrider MAX_FILE_SIZE direktivet som var specificeret i HTML formen',
            3 => 'Billede blev kun delvist uploadet',
            4 => 'Ingen fil blev uploadet',
            6 => 'Mangler en midlerridig mappe',
            7 => 'Failed to write file to disk.',
            8 => 'En PHP extension stoppede filen i at uploade.',
        );

        $maxImageSize = 15000;
        $response = [];

        $fileName = $file['name'];
        $tmpName = $file['tmp_name'];
        $size = $file['size'] / 1024;
        $error = $file['error'];
        $type = $file['type'];

        if($size > $maxImageSize){
            $response['error'] = "Too big";
        }

        $fileExt = explode('.', $fileName);
        $actualExt = strtolower(end($fileExt));

        if($error === 0){
            $date = date("Y-m-d");
            $fileNameNew = uniqid('', true) . "---" . $date . "---" . "." . $actualExt;
            $fileDestination = __DIR__ . "/../../../../public/img/add-spot/" . $fileNameNew;
            if(move_uploaded_file($tmpName, $fileDestination)){                
                if(file_exists($fileDestination)){
                    $response['success'] = $fileNameNew;
                }else{
                    $response['error'] = "Failed";
                }
            }else{
                $response['error'] = $fileDestination;
            }
        }else{
            $response['error'] = $phpFileUploadErrors[$error];
        }
        echo json_encode($response);
    }

    private function getMapScript(){

        $url = "https://maps.googleapis.com/maps/api/js?key=".GoogleAPIKey();

        $file = file_get_contents($url);

        Header("content-type: application/x-javascript");
        echo $file;
    }

    private function getGeocodeData($latitudeCord,$longitudeCord){
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$latitudeCord.",".$longitudeCord."&key=".GoogleAPIKey()."&language=en";

        $file = file_get_contents($url);

        Header("Content-Type: application/json;");
        echo $file;
    }
}