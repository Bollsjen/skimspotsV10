<div class="spot-container">
    <div class="spot-wrapper">
        <form action="/browse-spots" method="POST" class="top-path">
                <a href="../">Home</a> /
                <a name="country" href="/browse-spots?country=<?php echo $data["spot"]->Country()->Name(); ?>"><?php echo $data["spot"]->Country()->Name(); ?></a>
                </a>/ <a class="spot"><?php echo $data["spot"]->Title(); ?></a>
            </form>
            <h1 class="spot-title"><?php echo $data["spot"]->Title(); ?></h1>
            <form class="rating-system" action="/rating" method="POST">
                <input type="hidden" value="<?php echo $data["spot"]->ID(); ?>" name="spotID">
                <input type="hidden" name="g-recapcha-response" id="g-recapcha-response">
                <button class="rating-btn" name="rating" value="5" onclick="submit()"><i class="fa fa-star" style="color: <?php if($rating > 4.5){echo "#E5E500";}else{echo "#777";} ?>;"></i></button>
                <button class="rating-btn" name="rating" value="4" onclick="submit()"><i class="fa fa-star" style="color: <?php if($rating > 3.5){echo "#E5E500";}else{echo "#777";} ?>;"></i></button>
                <button class="rating-btn" name="rating" value="3" onclick="submit()"><i class="fa fa-star" style="color: <?php if($rating > 2.5){echo "#E5E500";}else{echo "#777";} ?>;"></i></button>
                <button class="rating-btn" name="rating" value="2" onclick="submit()"><i class="fa fa-star" style="color: <?php if($rating > 1.5){echo "#E5E500";}else{echo "#777";} ?>;"></i></button>
                <button class="rating-btn" name="rating" value="1" onclick="submit()"><i class="fa fa-star" style="color: <?php if($rating > 0.5){echo "#E5E500";}else{echo "#777";} ?>;"></i></button>
            </form>

            <div class="nav-tab-card">
            <ul class="nav-tabs-ul">
                <a class="nav-tab-btn" href="javascript:void(0);" onclick="ImgMapChange('img');">
                    <li class="nav-tabs-items tab-active" id="img-btn">
                        Images
                    </li>
                </a>                
                <a class="nav-tab-btn" href="javascript:void(0);" onclick="ImgMapChange('map');">
                    <li class="nav-tabs-items" id="map-btn">
                        Map
                    </li>
                </a>
            </ul>
            <div class="nav-tab-card-body">
                <div class="nav-tab-card-wrapper">
                    <div id="img-map-content">
                    <img id="spot-img" src="/public/img/spots/<?php echo $data["spot"]->Images()[0]->Image(); ?>">
                    <div class="img-btn-wrapper">
                        <button class="img-btn" onclick="ChangeImage(-1);">
                            <i class="fa fa-arrow-circle-left "></i>
                        </button>
                        <b style="padding: 0px 0px 15px 0px; margin: 0;" id="imgCount">1/<?php echo count($data["spot"]->Images()); ?></b>
                        <button class="img-btn" onclick="ChangeImage(1)">
                            <i class="fa fa-arrow-circle-right "></i>
                        </button>
                    </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="nav-tab-card spot-info-card">
            <ul class="nav-tabs-ul">
                <a class="nav-tab-btn" href="javascript:void(0);" onclick="SpotInfoChange('desc');">
                    <li class="nav-tabs-items tab-active" id="desc-btn">
                        Description
                    </li>
                </a>
                <a class="nav-tab-btn" href="javascript:void(0);" onclick="SpotInfoChange('event');">
                    <li class="nav-tabs-items" id="event-btn">
                        Events
                    </li>
                </a>
                <a class="nav-tab-btn" href="javascript:void(0);" onclick="SpotInfoChange('comments');">
                    <li class="nav-tabs-items" id="comments-btn">
                        Comments
                    </li>
                </a>
            </ul>
                <div class="nav-tab-card-body">
                    <div class="nav-tab-card-wrapper">
                        <div id="nav-tab-desc" class="nav-tab-desc">
                        <h3><?php echo $data["spot"]->Title(); ?></h3>
                        <p><?php echo $data["spot"]->Description(); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-tab-card spot-edit-card">
            <ul class="nav-tabs-ul">
                <a class="nav-tab-btn" href="javascript:void(0);" onclick="SpotEditChange('edit');">
                    <li class="nav-tabs-items tab-active" id="edit-btn">
                        Edit spot
                    </li>
                </a>
                <a class="nav-tab-btn" href="javascript:void(0);" onclick="SpotEditChange('add');">
                    <li class="nav-tabs-items" id="add-btn">
                        Add new spot
                    </li>
                </a>
            </ul>
            <div class="nav-tab-card-body">
                <div class="nav-tab-card-wrapper">
                    <div class="nav-tab-spot-edit" id="nav-tab-edit">
                        <p>Wrong or missing information?</p>
                        <p>Edit this spot here:</p>
                        <form action="../edit-spot/" method="POST">
                            <button style="background-color: transparent; border: none" name="spotID" value="<?php echo $data["spot"]->ID(); ?>" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            </div>

            <div class="spot-page-spot-wrapper">
                <div class="spots-nearby">
                    <h3>Spots nearby</h3>
                </div>

                <?php
                $spot = $data['nearbySpots'];
            for($i = 0; $i < $spot->Length(); $i++){?>
            <a class="spot-page-spot-card" href="/spot?spotID=<?php echo $spot->GetAt($i)->ID(); ?>">
                <div>
                    <img src="/public/img/spots/<?php echo $spot->GetAt($i)->Images()[0]->Image(); ?>">
                    <div class="spot-card-body">
                        <p class="spot-card-title"><?php echo $spot->GetAt($i)->Title(); ?></p>
                    </div>
                    <div class="spot-card-info">
                        <p>Type: <?php echo $spot->GetAt($i)->Type(); ?></p>
                    </div>
                    <div class="spot-card-info">
                        <p><?php echo $spot->GetAt($i)->Country()->Name() . ", " . $spot->GetAt($i)->Country()->Continent(); ?></p>
                    </div>
                    <div class="spot-card-footer">
                        <p>Spot rating:</p>
                        <div class="spot-card-rating">
                            <?php 
                            if($spot->GetAt($i)->Rating() < 1.5 && $spot->GetAt($i)->Rating() > 0.5){
                                ?>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <?php
                            }else if ($spot->GetAt($i)->Rating() > 1.5 && $spot->GetAt($i)->Rating() < 2.5){
                                ?>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <?php
                            }else if ($spot->GetAt($i)->Rating() > 2.5 && $spot->GetAt($i)->Rating() < 3.5){
                                ?>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <?php
                            }else if ($spot->GetAt($i)->Rating() > 3.5 && $spot->GetAt($i)->Rating() < 4.5){
                                ?>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <?php
                            }else if ($spot->GetAt($i)->Rating() > 4.5){
                                ?>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <?php
                            }else{
                                ?>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </a>
            <?php
            }
            ?>
            </div>

            <div class="spot-support-tab">
                <ul class="nav-tabs-ul">
                    <a class="nav-tab-btn">
                        <li class="nav-tabs-items tab-active">
                            Support
                        </li>
                    </a>
                    <div class="nav-tab-card-body">
                        <div class="nav-tab-card-wrapper">
                            <div class="nav-tab-support">
                                <h4>
                                    Support us
                                </h4>
                                <p>
                                    As long as this page do not have any ads are you more than welcome support the page. Every support is appreciated! <a href="https://www.patreon.com/skimspots">Go to patreon</a>
                                </p>
                                <a href="https://www.patreon.com/skimspots">
                                    <img src="/public/img/about/patreon.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>