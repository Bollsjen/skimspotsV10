<?php

namespace App\http\Web\Models;

use App\datatypes\DataList;
use App\models\Spot;

class CardModel{
    public function GetNewestSpots(DataList $list){
        $result = "";
        for($i = 0; $i < $list->Length(); $i++){
            $result = $result . $this->Card($list->GetAt($i), "");
        }

        return $result;
    }

    public function GetTop6Spots(DataList $list){
        $result = "";
        for($i = 0; $i < $list->Length(); $i++){
            $result = $result . $this->Card($list->GetAt($i), "");
        }

        return $result;
    }

    public function GetMostVisited(DataList $list){
        $result = "";
        for($i = 0; $i < $list->Length(); $i++){
            $result = $result . $this->Card($list->GetAt($i), "");
        }

        return $result;
    }



    private function Card(Spot $spot, string $animate){
        $result = '<a class="spot-card"';
        if($animate == "right"){ $result = $result . 'id="spot-card-holder-right"'; }else if($animate == "left"){ $result = $result . 'id="spot-card-holder-left"';} $result = $result . ' href="spots/?spotID='; $result = $result . $spot->ID().'">';
        $result = $result . '
            <div>
                '; 
                if($spot->Images()->GetAt(0) != null) { $result = $result . '<img src="data:image/' . $spot->Images()->GetAt(0)->ImageType() . ';base64,'.base64_encode($spot->Images()->GetAt(0)->Base64()).'">';}
                else 
                {$result = $result . '<img src="">';}
        $result = $result . '   <div class="spot-card-body">
                <p class="spot-card-title">' . str_replace("\\","",$spot->Title()) . '</p>' .
        '   </div>
            <div class="spot-card-info">
                <p>Type: '. $spot->Type()->Type() . '</p>
            </div>
                <div class="spot-card-info">
                    <p>' . $spot->Country()->Name(). ', ' .$spot->Country()->Continent().'</p>
                </div>
                <div class="spot-card-footer">
                    <p>Spot rating:</p><div class="spot-card-rating">';
                        if($spot->Rating() > 0.5 && $spot->Rating() < 1.5){
                            $result = $result . 
                            '
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            ';
                        } else if($spot->Rating() > 1.5 && $spot->Rating() < 2.5){
                            $result = $result .  
                            '
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            ';
                        } else if($spot->Rating() > 2.5 && $spot->Rating() < 3.5){
                            $result = $result .  
                            '
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            ';
                        } else if($spot->Rating() > 3.5 && $spot->Rating() < 4.5){
                            $result = $result .  
                            '
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            ';
                        } else if($spot->Rating() > 4.5 && $spot->Rating() <= 5){
                            $result = $result .  
                            '
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                            ';
                        }else{
                            $result = $result .  
                            '
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                            ';
                        }
                        $result = $result . '
                    </div>
                </div>                
            </div>
            </a>';

            return $result;
    }
}