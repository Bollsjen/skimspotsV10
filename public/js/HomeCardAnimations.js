    var spotCardsTop = document.getElementById("scroll-to-topspot").getElementsByClassName("spot-card");
    var spotCardsVisit = document.getElementById("scroll-to-visit").getElementsByClassName("spot-card");
    var doneVisit = 0;
    var doneTop = 0;
    
$(window).scroll(function() {
   var  hT = $('#scroll-to-visit').offset().top,
        hH = $('#scroll-to-visit').innerHeight(),
        wH = $(window).height(),
        wS = $(this).scrollTop();
   if (wS > ((hT+hH-wH)*-1)+(wH*0.45)){
       //console.log(hT);
        if(doneVisit == 0){
            doneVisit++;
            //console.log((hT+hH-(wH*0.5))+" | "+wS);       
            for (i = spotCardsVisit.length-1; i >= 0; i--){
                //alert(i);
                if(i == spotCardsVisit.length-1){
                    spotCardsVisit[i].style.transitionDelay = (300).toString()+"ms";
                }else if(i == spotCardsVisit.length-2){
                    spotCardsVisit[i].style.transitionDelay = (200).toString()+"ms";
                }else if(i == spotCardsVisit.length-3){
                    spotCardsVisit[i].style.transitionDelay = (100).toString()+"ms";
                }
                //spotCardsVisit[i].style.transitionDelay = ((i)*100).toString()+"ms";
                spotCardsVisit[i].style.opacity = 1;
                spotCardsVisit[i].style.transform = "translateX(0)";           
       }
     
       }
       /*document.getElementById("scroll-to-visit").style.opacity = 1;
       document.getElementById("scroll-to-visit").style.transform = "translateX(0)";*/
   }
});

$(window).scroll(function() {
    var  hT = $('#scroll-to-topspot').offset().top,
        hH = $('#scroll-to-topspot').innerHeight(),
        wH = $(window).height(),
        wS = $(this).scrollTop();
    if (wS > ((hT+hH-wH)*-1)){
       if(doneTop == 0){
            doneTop++;
            //console.log((hT+hH-(wH*0.5))+" | "+wS);       
            for (i = 0; i < spotCardsTop.length; i++){
                spotCardsTop[i].style.transitionDelay = ((i+1)*100).toString()+"ms";
                spotCardsTop[i].style.opacity = 1;
                spotCardsTop[i].style.transform = "translateX(0)";           
            }
        }
    }
});

/*window.scroll(function() {
   var hH = document.getElementById('scroll-to-featured').innerHeight(),
       wH = window.height(),
       wS = this.scrollTop();
   if (wS > ((hH-wH)*-1)-(wH*0.45)){
       //console.log((hT+hH-(wH*0.5))+" | "+wS);
       document.getElementById("scroll-to-featured").style.opacity = 1;
       document.getElementById("scroll-to-featured").style.transform = "translateX(0)";
   }
});*/