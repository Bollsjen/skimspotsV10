var map;
        var SpotMarker = [];

        var longitudeCord;
        var latitudeCord;

        var countries = document.getElementById("country").getElementsByTagName("option");
        var continent = document.getElementById("continent").getElementsByTagName("option");
        var countryToContinent = await axios.get("http://skimspots.arpa/api/Country?shortnameAndContinent=true")
        
        function initMap() {
            var latitude = 19.592119419416562; // YOUR LATITUDE VALUE
            var longitude = -16.464734143670757; // YOUR LONGITUDE VALUE

            var myLatLng = {lat: latitude, lng: longitude};

            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 2,
              disableDoubleClickZoom: true, // disable the default map zoom on double click
            });

            // Update lat/long value of div when anywhere in the map is clicked
            google.maps.event.addListener(map,'click',function(event) {

                var clickedCoord = {lat: event.latLng.lat(), lng: event.latLng.lng()};
                if(SpotMarker.length > 0){
                SpotMarker[0].setMap(null);
              }
                SpotMarker = [];
                var marker = new google.maps.Marker({
                  position: clickedCoord,
                  map: map,
                  //title: 'Hello World'

                  // setting latitude & longitude as title of the marker
                  // title is shown when you hover over the marker
                  title: latitude + ', ' + longitude
                });
                SpotMarker.push(marker);
                document.getElementById("Latitude").value = event.latLng.lat();
                document.getElementById("Longtitude").value = event.latLng.lng();

                longitudeCord = event.latLng.lng()
                latitudeCord = event.latLng.lat()
                let url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+latitudeCord+","+longitudeCord+"&key=AIzaSyD1nHBTBTkJtRrWmpJb2ZxihkGiyG5FQO0&language=en";
                fetch(url)
                    .then(response => response.json())
                    .then(data => {                        
                        let parts = data.results[0].address_components;
                        parts.forEach(async part => {
                            if(part.types.includes("country")){
                                var country = "";
                                for (i = 0; i < countries.length; i++){
                                    if(countries[i].value == part.long_name){
                                        countries[i].selected = "selected";
                                        for(j = 0; j < continent.length; j++){                                            
                                            if(countryToContinent[part.short_name] == continent[j].value){
                                                continent[j].selected = "selected";
                                            }
                                        }                                        
                                    }
                                }                                
                            }
                        });
                    })
                    .catch(err => console.warn(err.message));
            });
        }



        

window.onload = function (){
  if(imgArray.length > 0){
    UpdateImgList();
  }
};

/*function SendSpot (){
    var longtitude = _("Longtitude").value;
    var latitude = _("Latitude").value;
    var typeRadio = document.getElementsByClassName("spot-type-radio");
    var spotTitle = _("spot-title").value;
    var desc = _("desc").value;
    var user_name = _("user-name").value;
    var user_mail = _("user-mail").value;
    var country = _("country").value;
    var continent = _("continent").value;
    var images = imgArray;
    var type = "";
    for (i = 0; i < typeRadio.length; i++){
        if(typeRadio[i].checked){
            type = typeRadio[i].value;
        }
    }
    if(latitude != "" && longtitude != "" && typeRadio != "" && spotTitle != "" && desc != "" && user_name != "" && user_mail != "" && country != "" && continent != "" && images != "" && type != ""){
    $.ajax({
        type: "POST",
        url: "/add-spot",
        data:{
            longtitude: longtitude,
            latitude: latitude,
            spotType: type,
            spotTitle: spotTitle,
            name: user_name,
            mail: user_mail,
            desc: desc,
            images: images,
            country: country,
            continent: continent
        },
        success: function(result){
            alert(result);
            $.ajax({
        type: "POST",
        url: "send-thank-you.php",
        data:{
            longtitude: longtitude,
            latitude: latitude,
            spotType: type,
            spotTitle: spotTitle,
            name: user_name,
            mail: user_mail,
            desc: desc,
            images: images,
            country: country,
            continent: continent
        },
        success: function(result){
            alert(result);
            //document.getElementById("tilfoej-status").innerHTML = result;
        },
        error: function(msg,status, error){
            alert("User mail: "+mesg+ " | "+status+" | "+error);
        }
    });

        },
        error: function(msg,status, error){
            alert("Operator mail: "+mesg+ " | "+status+" | "+error);
        }
    });
    }else{
        alert("One ore more fields are missing");
    }
}

function _(el){
    return document.getElementById(el);
}

function upload(){
          var img = _("img-file").files[0];
          var formdata = new FormData();
          formdata.append("img-file", img);
          var ajax = new XMLHttpRequest();
          ajax.upload.addEventListener("progress", progressHandler, false);
          ajax.addEventListener("load", completeHandler, false);
          ajax.addEventListener("error", errorHandler, false);
          ajax.addEventListener("abort", abortHandler, false);
          ajax.open("POST", "/add-spot");
          ajax.send(formdata);
      }

function progressHandler(e){
    var percent = (e.loaded / e.total) * 100;
    _("img-progress").value = Math.round(percent);
}

function completeHandler(e){
    ImagesUpdate(e.target.responseText);
    _("img-progress").value = 0;
}

function errorHandler(e){
    _("status").innerHTML = e.target.responseText;
    alert("Upload fejlede");
}

function abortHandler(e){
    _("status").innerHTML = e.target.responseText;
    alert("Upload afbrudt");
}

function ImagesUpdate(status){
  imgArray.push(status);
  UpdateImgList();
}

function UpdateImgList(){
  var html = "";
  for (var i = 0; i < imgArray.length; i++) {
    html = html+'<div class="img-holder"><img src="../img/add-spot/'+imgArray[i]+'" style="width: 75px; height: 75px"><a class="img-slet-ikon" onclick="ImgSlet('+[i]+');"><i class="img-slet fa fa-times" style="color: red; font-size: 24px"></i></a></div>';
  }
  _("img-preview").innerHTML = html;
}

function ImagesIsDelete(){
    imgArray = new array();
    UpdateImgList();
}
function ImgSlet(_billede){
  $.ajax({
    url: "remove-img.php",
    type: "POST",
    data: ({billede: _billede}),
    success: function(result){      
          if(_billede > 0){
            imgArray.splice(_billede,_billede);
            UpdateImgList();
          }else {
            imgArray.splice(_billede,_billede+1);
            UpdateImgList();
          }
      }
  });
}*/