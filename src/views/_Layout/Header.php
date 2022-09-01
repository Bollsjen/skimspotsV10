<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(session_status() == PHP_SESSION_NONE){
session_start();
}
?>
<html>
    <head>
        <title>Skimspots</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <script src="https://www.google.com/recaptcha/api.js?render=6LeZ6mkgAAAAAKxHofts00PIbZkSglZQAuqM2ibA"></script> 
        <link rel="stylesheet" type="text/css" href="/public/styling/main-styling.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/home.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/general.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/spot.css" />
        <!--<link rel="stylesheet" type="text/css" href="/public/styling/spot-page.css" />-->
        <link rel="stylesheet" type="text/css" href="/public/styling/footer.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/edit-spot.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/add-spot.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/event.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/spot-browse.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/about.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/login-form.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/map.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/search.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/event-dashboard.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/event-dashboard-create-event.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/terms-and-privacy.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/ad-slide.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="/public/styling/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//wpcc.io/lib/1.0.2/cookieconsent.min.css"/>
        <script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>
        <script>window.addEventListener("load", function(){window.wpcc.init({"colors":{"popup":{"background":"#919100","text":"#ffffff","border":"#e6b3b3"},"button":{"background":"#e6b3b3","text":"#000000"}},"position":"bottom","padding":"large","margin":"none","fontsize":"large","content":{"message":"This website uses cookies to make sure you don't rate a spot more than once."}})});</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>
            function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "navbar-menu") {
                x.className += " responsive";
            } else {
                x.className = "navbar-menu";
            }
            }
        </script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue@next"></script>
    </head>
    <body>
        <div class="menu">
    <nav class="topnav" id="myTopnav">
        <div class="topnav-container">
        <a href="/" id="active" class="active"><img id="logo" class="logo" src="/public/img/menu/Logo-text.png"></a>
        <a href="/map" class="can-hover btn-default">Spotmap</a>
        <a href="/events" class="can-hover btn-default">Events</a>
        <a href="/about" class="can-hover btn-default">About</a>
        <!---<a href="/cliplife/" class="can-hover btn-default">ClipLife</a>-->
        <a id="menuformdiv" class="menu-form-div form-div-default">
            <form class="menu-form" action="/search" method="POST">
                <div class="input-container-menu">                    
                    <input class="input-field-menu" type="text" name="search" placeholder="Search...">
                    <button style="padding:0px; background-color: transparent; border: none"><i class="i-icon-menu-search fa fa-search"></i></button>
                </div>
            </form>
        </a>
        <a href="javascript:void(0);" style="font-size:20px;" id="icon" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
    </nav>
</div>

    <script>
        var clicked = 0;
        var w = window.innerWidth;
        var trigger = 25;
        var wS = 0;
        var mapCheck = 0;
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
                clicked = 1;
                document.getElementById("myTopnav").style.backgroundColor = "rgba(51,51,51,1)";
            } else {
                x.className = "topnav";
                clicked = 0;
                if(wS < trigger && mapCheck == 0){
                    document.getElementById("myTopnav").style.backgroundColor = "rgba(51,51,51,0.75)";
                }
            }
        }


        $(window).scroll(function() {
                var minWidth = 768;                
                var aBtn = document.getElementsByClassName("can-hover");
                var dropBtn = document.getElementsByClassName("dropbtn");
                wS = $(this).scrollTop();
                if(mapCheck == 0){
                if (wS > trigger){                    
                    document.getElementById("myTopnav").style.backgroundColor = "rgba(51,51,51,1)";
                    document.getElementById("logo").style.width = "125";
                    document.getElementById("logo").style.height = "20";
                    document.getElementById("logo").style.padding = "0px";
                    document.getElementById("active").style.padding = "14px 16px 14px 16px";

                    document.getElementById("icon").style.padding = "12px";
                    document.getElementById("icon").style.margin = "0px 10px 0px 0px";

                    for(var i = 0; i < aBtn.length; i++){
                    aBtn[i].className = "can-hover btn-change";
                    }

                    for(var i = 0; i < dropBtn.length; i++){
                    dropBtn[i].className = "dropbtn btn-change";
                    }                    

                    document.getElementById("menuformdiv").className = "menu-form-div form-div-change";
                }else {
                    if(clicked == 0){
                    document.getElementById("myTopnav").style.backgroundColor = "rgba(51,51,51,0.5)";
                    }
                    document.getElementById("logo").style.width = "175";
                    document.getElementById("logo").style.height = "30";
                    document.getElementById("logo").style.padding = "0px";
                    document.getElementById("active").style.padding = "22px 18px 24px 18px";

                    document.getElementById("icon").style.padding = "25px";
                    document.getElementById("icon").style.margin = "0px";

                    for(var i = 0; i < aBtn.length; i++){
                    aBtn[i].className = "can-hover btn-default";
                    }
                    
                    for(var i = 0; i < dropBtn.length; i++){
                    dropBtn[i].className = "dropbtn btn-default";
                    }

                    document.getElementById("menuformdiv").className = "menu-form-div form-div-default";
                }
                }
            });

            function checkMap(){
                var loc = window.location.pathname;
                $.ajax({
                    url:loc + "mapCheck.txt",
                    type:'HEAD',
                    success: function()
                    {
                        mapCheck = 1;                        
                    }
                });
            }

            window.load = checkMap();
    </script>