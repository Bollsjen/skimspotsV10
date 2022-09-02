<main>
    <div class="top-banner">
        <video class="banner-video" loop="" muted="" autoplay="">
            <source src="/public/video/homevideo.mp4" type="video/mp4">
            <source src="/public/video/homevideo.webm" type="video/webm">
            <source src="/public/video/homevideo.ogv" type="video/ogv">
        </video>
        <div class="home-video-overlay">
        <h1 class="banner-title">Skimspots Worldwide</h1>
        <p class="banner-text">WAVE AND FLATLAND</p>
        <p class="banner-text-small">Difficult to find skim spots near you or on vactions? Find skimspots from all over the world on skimspots.com!</p>
        <form class="banner-form" action="/search" method="POST">
            <div class="input-container">
                <button style="margin:0; padding: 0; background-color: transparent; border:none" type="submit"><i class="i-icon-searchhome fa fa-search" id="search-icon"></i></button>
                <input class="input-field" type="text" name="search" placeholder="Search...">
            </div>
        </form>
        </div>
        <div class="credit-div">
            <p class="video-credit">Credit to: Victoria Skimboards, DB Skimboards</p>
        </div>
    </div>

    <div class="container">
        <div class="spots-wrapper">
            <h3 class="home-titles">Newest spots</h3>
            <?php
            foreach($data['newestSpots'] as $spot){?>
            <a class="spot-card" href="/spot?spotID=<?php echo $spot->ID(); ?>">
                <div>
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
                </div>
            </a>
            <?php
            }
            ?>

            
            <h3 class="home-titles">Top skim spots</h3>
            <div class="top-spots-wrapper">
            <div class="featured-spots" id="scroll-to-topspot">
            <?php
            foreach($data['top6Spots'] as $spot){?>
            <a class="spot-card" href="/spot?spotID=<?php echo $spot->ID(); ?>">
                <div>
                    <img src="/public/img/spots/<?php echo $spot->Images()[0]->Image(); ?>">
                    <div class="spot-card-body">
                        <p class="spot-card-title"><?php echo $spot->Title(); ?></p>
                    </div>
                    <div class="spot-card-info">
                        <p>Type: <?php echo $spot->Type(); ?></p>
                    </div>
                    <div class="spot-card-info">
                        <p><?php echo $spot->Country()->Name() . ", " . $spot->Country()->Continent();; ?></p>
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
                </div>
            </a>
            <?php
            }
            ?>
            <div class="spot-browse-btn-div">
                <a href="/browse-spots">Browse skim spots</a>
            </div>
            </div>
        </div>
            
            <h3 class="home-titles">Most visited</h3>
            <div class="featured-spots" id="scroll-to-visit">
            <?php
            foreach($data['mostVisitedSpots'] as $spot){?>
            <a class="spot-card" href="/spot?spotID=<?php echo $spot->ID(); ?>">
                <div>
                    <img src="/public/img/spots/<?php echo $spot->Images()[0]->Image(); ?>">
                    <div class="spot-card-body">
                        <p class="spot-card-title"><?php echo $spot->Title(); ?></p>
                    </div>
                    <div class="spot-card-info">
                        <p>Type: <?php echo $spot->Type(); ?></p>
                    </div>
                    <div class="spot-card-info">
                        <p><?php echo $spot->Country()->Name() . ", " . $spot->Country()->Continent();; ?></p>
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
                </div>
            </a>
            <?php
            }
            ?>
            </div>

        </div>
    </div>
</main>

<script src="/public/js/HomeCardAnimations.js"></script>
