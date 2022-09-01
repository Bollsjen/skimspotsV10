<main class="container">
    <div id="browse-spots" class="spots-wrapper">
        <div class="browse-spot-title">
            <h1>Browse spots</h1>
        </div>
        <div class="browse-spots-form">
            <div class="form-input-field">
                <i class="fa fa-list i-icon-right"></i>
                <select id="right-select" spot-country-filter onchange="SortSpots();">
                <option value="">Any</option>
                    <?php
                    foreach($data['countries'] as $country){
                        ?>
                        <option value="<?php echo $country->ID(); ?>" <?php if(isset($data['country']))if($data['country'] == $country->ID() || $data['country'] == $country->Name()){echo "selected";} ?>><?php echo $country->Name(); ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-input-field">
                <i class="fa fa-list i-icon-right"></i>
                <select id="left-select" spot-type-filter onchange="SortSpots();">
                    <option value="">Any spot type</option>
                    <option value="1">Flatland</option>
                    <option value="2">Wave</option>                        
                </select>
            </div>
            <div class="form-input-field">
                <i class="fa fa-list i-icon-left"></i>
                <select id="left-select" spot-sorting onchange="SortSpots();">
                    <option value="alpha">Alphabetic</option>
                    <option value="rating" selected>Spot rating</option>                        
                    <option value="Mvisits">Most visits</option>
                    <option value="Lvisits">Least visits</option>
                </select>
            </div>    
        </div>
        <div class="browse-spot-container" id="browse-spot-conatiner">
            <?php
            foreach($data['spots'] as $spot){
                ?>
                <a class="spot-card" href="/spot?spotID=<?php echo $spot->Id(); ?>">
                        <img src="/public/img/spots/<?php echo $spot->Images()[0]->Image(); ?>">
                        <div class="spot-card-body">
                            <p class="spot-card-title"><?php echo $spot->Title(); ?></p>
                        </div>
                        <div class="spot-card-info">
                            <p>Type: <?php echo $spot->Type(); ?></p>
                        </div>
                        <div class="spot-card-info">
                            <p><?php echo $spot->Country()->Name() . ", " . $spot->Country()->Continent(); ?></p>
                        </div>
                        <div class="spot-card-footer">
                            <p>Spot rating:</p>
                            <div class="spot-card-rating">
                            <?php 
                            if($spot->Rating() < 1.5 && $spot->Rating() > 0.5){
                                ?>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <?php
                            }else if ($spot->Rating() > 1.5 && $spot->Rating() < 2.5){
                                ?>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <?php
                            }else if ($spot->Rating() > 2.5 && $spot->Rating() < 3.5){
                                ?>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <?php
                            }else if ($spot->Rating() > 3.5 && $spot->Rating() < 4.5){
                                ?>
                                <i class="fa fa-star" style="color: #777; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <i class="fa fa-star" style="color: #E5E500; font-size: 24px"></i>
                                <?php
                            }else if ($spot->Rating() > 4.5){
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
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</main>

<script src="/public/js/browse-spots.js"></script>