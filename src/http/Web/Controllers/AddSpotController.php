<?php

namespace App\http\Web\Controllers;

use App\http\Web\Controllers\BaseController;

class AddSpotController extends BaseController {
    public function onGet(){
        $this->view("spot/Add-spot");
    }

    public function onPost($params){
        if(isset($params['img-file'])){
            $this->handleImage($params['img-file']);
        }
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
            $fileDestination = "../../../../public/img/add-spot/" . $fileNameNew;
            if(move_uploaded_file($tmpName, $fileDestination)){                
                if(is_dir($fileDestination) && is_writable($fileDestination)){
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
        print_r($response);
    }
}