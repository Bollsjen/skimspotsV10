<div class="spot-container">
    <div class="spot-wrapper">

<?php

if(isset($data['no'])){
    ?>
    <h1 style="grid-column: span 6;">No search input found</h1>
    <?php
}else{
?>
<h1 style="grid-column: span 6;">Results for: <?php echo($data['search']); ?></h1>

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

<?php
}
?>

    </div>
</div>