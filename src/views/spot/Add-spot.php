<div class="container">
    <div class="add-wrapper">
        <div class="add-spot-title">
            <h1>Add spot</h1>
            <p>Click on the skim spot location on the map or paste in coordiantes in the form and fill the form.</p>
        </div>
        <div class="map">
        <div id="map"></div>
        </div>
        <div class="form-wrapper">
            <form method="POST">
                <div class="input-container">
                    <i class="i-icon fa fa-map-marker" style="font-size: 22px"></i>
                    <input class="input-field-coordN" id="Latitude" type="text" name="coordinateN" placeholder="Latitude" required>
                    <input class="input-field-coordE" id="Longtitude" type="text" name="coordinateE" placeholder="Longtitude" required>
                </div>
                <div class="input-container spot-type">
                    <ul>
                        <li><input class="spot-type-radio" type="radio" name="type" value="flatland" required><label>Flatland</label></li>
                        <li><input class="spot-type-radio" type="radio" name="type" value="wave" required><label>Wave</label></li>
                    </ul>
                </div>
                <div class="input-container">
                    <i class="i-icon fa fa-pencil" style="font-size: 22px"></i>
                    <input class="input-field" type="text" name="spot-title" placeholder="Spot title..." id="spot-title" required>
                </div>
                <div class="input-container">
                    <i class="i-icon fa fa-globe" style="font-size: 22px"></i>
                    <select class="input-field" name="country" id="country" required>
                        <option value="Afghanistan" id="Afghanistan">Afghanistan</option><option value="Åland Islands" id="Åland Islands">Åland Islands</option><option value="Albania" id="Albania">Albania</option><option value="Algeria" id="Algeria">Algeria</option><option value="American Samoa" id="American Samoa">American Samoa</option><option value="Andorra" id="Andorra">Andorra</option><option value="Angola" id="Angola">Angola</option><option value="Anguilla" id="Anguilla">Anguilla</option><option value="Antarctica" id="Antarctica">Antarctica</option><option value="Antigua and Barbuda" id="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina" id="Argentina">Argentina</option><option value="Armenia" id="Armenia">Armenia</option><option value="Aruba" id="Aruba">Aruba</option><option value="Australia" id="Australia">Australia</option><option value="Austria" id="Austria">Austria</option><option value="Azerbaijan" id="Azerbaijan">Azerbaijan</option><option value="Bahamas" id="Bahamas">Bahamas</option><option value="Bahrain" id="Bahrain">Bahrain</option><option value="Bangladesh" id="Bangladesh">Bangladesh</option><option value="Barbados" id="Barbados">Barbados</option><option value="Belarus" id="Belarus">Belarus</option><option value="Belgium" id="Belgium">Belgium</option><option value="Belize" id="Belize">Belize</option><option value="Benin" id="Benin">Benin</option><option value="Bermuda" id="Bermuda">Bermuda</option><option value="Bhutan" id="Bhutan">Bhutan</option><option value="Bolivia, Plurinational State" id="Bolivia, Plurinational State">Bolivia, Plurinational State</option><option value="Bonaire, Sint Eustatius and Saba" id="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option><option value="Bosnia and Herzegovina" id="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana" id="Botswana">Botswana</option><option value="Bouvet Island" id="Bouvet Island">Bouvet Island</option><option value="Brazil" id="Brazil">Brazil</option><option value="British Indian Ocean Territory" id="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei Darussalam" id="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria" id="Bulgaria">Bulgaria</option><option value="Burkina" id="Burkina Faso">Burkina Faso</option><option value="Burundi" id="Burundi">Burundi</option><option value="Cambodia" id="Cambodia">Cambodia</option><option value="Cameroon" id="Cameroon">Cameroon</option><option value="Canada" id="Canada">Canada</option><option value="Cape Verde" id="Cape Verde">Cape Verde</option><option value="Cayman Islands" id="Cayman Islands">Cayman Islands</option><option value="Central African Republic" id="Central African Republic">Central African Republic</option><option value="Chad" id="Chad">Chad</option><option value="Chile" id="Chile">Chile</option><option value="China" id="China">China</option><option value="Christmas Island" id="Christmas Island">Christmas Island</option><option value="Cocos (Keeling) Islands" id="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia" id="Colombia">Colombia</option><option value="Comoros" id="Comoros">Comoros</option><option value="Congo" id="Congo">Congo</option><option value="Congo, the Democratic Republic" id="Congo, the Democratic Republic">Congo, the Democratic Republic</option><option value="Cook Islands" id="Cook Islands">Cook Islands</option><option value="Costa Rica" id="Costa Rica">Costa Rica</option><option value="Côte d\'IvoireI" id="Côte d\'Ivoire">Côte d\'Ivoire</option><option value="Croatia" id="Croatia">Croatia</option><option value="Cuba" id="Cuba">Cuba</option><option value="Curaçao" id="Curaçao">Curaçao</option><option value="Cyprus" id="Cyprus">Cyprus</option><option value="Czech Republic" id="Czech Republic">Czech Republic</option><option selected="selected" value="Denmark" id="Denmark">Denmark</option><option value="Djibouti" id="Djibouti">Djibouti</option><option value="Dominica" id="Dominica">Dominica</option><option value="Dominican Republic" id="Dominican Republic">Dominican Republic</option><option value="Ecuador" id="Ecuador">Ecuador</option><option value="Egypt" id="Egypt">Egypt</option><option value="El Salvador" id="El Salvador">El Salvador</option><option value="Equatorial" id="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea" id="Eritrea">Eritrea</option><option value="Eritrea" id="Estonia">Estonia</option><option value="Ethiopia" id="Ethiopia">Ethiopia</option><option value="Falkland Islands (Malvinas)" id="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option><option value="Faroe Islands" id="Faroe Islands">Faroe Islands</option><option value="Fiji" id="Fiji">Fiji</option><option value="Finland" id="Finland">Finland</option><option value="France" id="France">France</option><option value="French Guiana" id="French Guiana">French Guiana</option><option value="French Polynesia" id="French Polynesia">French Polynesia</option><option value="French Southern Territories" id="French Southern Territories">French Southern Territories</option><option value="Gabon" id="Gabon">Gabon</option><option value="Gambia" id="Gambia">Gambia</option><option value="Georgia" id="Georgia">Georgia</option><option value="Germany" id="Germany">Germany</option><option value="Ghana" id="Ghana">Ghana</option><option value="Gibraltar" id="Gibraltar">Gibraltar</option><option value="Greece" id="Greece">Greece</option><option value="Greenland" id="Greenland">Greenland</option><option value="Grenada" id="Grenada">Grenada</option><option value="Guadeloupe" id="Guadeloupe">Guadeloupe</option><option value="Guam" id="Guam">Guam</option><option value="Guatemala" id="Guatemala">Guatemala</option><option value="Guernsey" id="Guernsey">Guernsey</option><option value="Guinea" id="Guinea">Guinea</option><option value="Guinea-Bissau" id="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana" id="Guyana">Guyana</option><option value="Haiti" id="Haiti">Haiti</option><option value="Heard Island and McDonald Islands" id="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option><option value="Holy See (Vatican City State)" id="Holy See (Vatican City State)">Holy See (Vatican City State)</option><option value="Honduras" id="Honduras">Honduras</option><option value="Hong Kong" id="Hong Kong">Hong Kong</option><option value="Hungary" id="Hungary">Hungary</option><option value="Iceland" id="Iceland">Iceland</option><option value="India" id="India">India</option><option value="Indonesia" id="Indonesia">Indonesia</option><option value="Iran, Islamic Republic" id="Iran, Islamic Republic">Iran, Islamic Republic</option><option value="Iraq" id="Iraq">Iraq</option><option value="Ireland" id="Ireland">Ireland</option><option value="Isle of Man" id="Isle of Man">Isle of Man</option><option value="Israel" id="Israel">Israel</option><option value="Italy" id="Italy">Italy</option><option value="Jamaica" id="Jamaica">Jamaica</option><option value="Japan" id="Japan">Japan</option><option value="Jersey" id="Jersey">Jersey</option><option value="Jordan" id="Jordan">Jordan</option><option value="Kazakhstan" id="Kazakhstan">Kazakhstan</option><option value="Kenya" id="Kenya">Kenya</option><option value="Kiribati" id="Kiribati">Kiribati</option><option value="Korea, Democratic People\'s Republic" id="Korea, Democratic People's Republic">Korea, Democratic People\'s Republic</option>
                        
                        
                        
                        
                        
                        
                        <option value="Korea, Republic" id="Korea, Republic">Korea, Republic</option><option value="Kuwait" id="Kuwait">Kuwait</option><option value="Kyrgyzstan" id="Kyrgyzstan">Kyrgyzstan</option><option value="Lao People\'s Democratic Republic" id="Lao People's Democratic Republic">Lao People\'s Democratic Republic</option>
                        
                        
                        
                        <option value="Latvia" id="Latvia">Latvia</option><option value="Lebanon" id="Lebanon">Lebanon</option><option value="Lesotho" id="Lesotho">Lesotho</option><option value="Liberia" id="Liberia">Liberia</option><option value="Libya" id="Libya">Libya</option><option value="Liechtenstein" id="Liechtenstein">Liechtenstein</option><option value="Lithuania" id="Lithuania">Lithuania</option><option value="Luxembourg" id="Luxembourg">Luxembourg</option><option value="Macao" id="Macao">Macao</option><option value="Macedonia, the former Yugoslav Republic" id="Macedonia, the former Yugoslav Republic">Macedonia, the former Yugoslav Republic</option><option value="Madagascar" id="Madagascar">Madagascar</option><option value="Malawi" id="Malawi">Malawi</option><option value="Malaysia" id="Malaysia">Malaysia</option><option value="Maldives" id="Maldives">Maldives</option><option value="Mali" id="Mali">Mali</option><option value="Malta" id="Malta">Malta</option><option value="Marshall Islands" id="Marshall Islands">Marshall Islands</option><option value="Martinique" id="Martinique">Martinique</option><option value="Mauritania" id="Mauritania">Mauritania</option><option value="Mauritius" id="Mauritius">Mauritius</option><option value="Mayotte" id="Mayotte">Mayotte</option><option value="Mexico" id="Mexico">Mexico</option><option value="Micronesia, Federated States" id="Micronesia, Federated States">Micronesia, Federated States</option><option value="Moldova, Republic" id="Moldova, Republic">Moldova, Republic</option><option value="Monaco" id="Monaco">Monaco</option><option value="Mongolia" id="Mongolia">Mongolia</option><option value="Montenegro" id="Montenegro">Montenegro</option><option value="Montserrat" id="Montserrat">Montserrat</option><option value="Morocco" id="Morocco">Morocco</option><option value="Mozambique" id="Mozambique">Mozambique</option><option value="Myanmar" id="Myanmar">Myanmar</option><option value="Namibia" id="Namibia">Namibia</option><option value="Nauru" id="Nauru">Nauru</option><option value="Nepal" id="Nepal">Nepal</option><option value="Netherlands" id="Netherlands">Netherlands</option><option value="New Caledonia" id="New Caledonia">New Caledonia</option><option value="New Zealand" id="New Zealand">New Zealand</option><option value="Nicaragua" id="Nicaragua">Nicaragua</option><option value="Niger" id="Niger">Niger</option><option value="Nigeria" id="Nigeria">Nigeria</option><option value="Niue" id="Niue">Niue</option><option value="Norfolk Island" id="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands" id="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway" id="Norway">Norway</option><option value="Oman" id="Oman">Oman</option><option value="Pakistan" id="Pakistan">Pakistan</option><option value="Palau" id="Palau">Palau</option><option value="Palestinian Territory, Occupied" id="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option><option value="Panama" id="Panama">Panama</option><option value="Papua New Guinea" id="Papua New Guinea">Papua New Guinea</option><option value="Paraguay" id="Paraguay">Paraguay</option><option value="Peru" id="Peru">Peru</option><option value="Philippines" id="Philippines">Philippines</option><option value="Pitcairn" id="Pitcairn">Pitcairn</option><option value="Poland" id="Poland">Poland</option><option value="Portugal" id="Portugal">Portugal</option><option value="Puerto Rico" id="Puerto Rico">Puerto Rico</option><option value="Qatar" id="Qatar">Qatar</option><option value="Réunion" id="Réunion">Réunion</option><option value="Romania" id="Romania">Romania</option><option value="Russian Federation" id="Russian Federation">Russian Federation</option><option value="Rwanda" id="Rwanda">Rwanda</option><option value="Saint Barthélemy" id="Saint Barthélemy">Saint Barthélemy</option><option value="Saint Helena, Ascension and Tristan da Cunha" id="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option><option value="Saint Kitts and Nevis" id="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia" id="Saint Lucia">Saint Lucia</option><option value="Saint Martin (French part)" id="Saint Martin (French part)">Saint Martin (French part)</option><option value="Saint Pierre and Miquelon" id="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadines" id="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa" id="Samoa">Samoa</option><option value="San Marino" id="San Marino">San Marino</option><option value="Sao Tome and Principe" id="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia" id="Saudi Arabia">Saudi Arabia</option><option value="Senegal" id="Senegal">Senegal</option><option value="Serbia" id="Serbia">Serbia</option><option value="Seychelles" id="Seychelles">Seychelles</option><option value="Sierra Leone" id="Sierra Leone">Sierra Leone</option><option value="Singapore" id="Singapore">Singapore</option><option value="Sint Maarten (Dutch part)" id="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option><option value="Slovakia" id="Slovakia">Slovakia</option><option value="Slovenia" id="Slovenia">Slovenia</option><option value="Solomon Islands" id="Solomon Islands">Solomon Islands</option><option value="Somalia" id="Somalia">Somalia</option><option value="South Africa" id="South Africa">South Africa</option><option value="South Georgia and the South Sandwich Islands" id="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option><option value="South Sudan" id="South Sudan">South Sudan</option><option value="Spain" id="Spain">Spain</option><option value="Sri Lanka" id="Sri Lanka">Sri Lanka</option><option value="Sudan" id="Sudan">Sudan</option><option value="Suriname" id="Suriname">Suriname</option><option value="Svalbard and Jan Mayen" id="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option><option value="Swaziland" id="Swaziland">Swaziland</option><option value="Sweden" id="Sweden">Sweden</option><option value="Switzerland" id="Switzerland">Switzerland</option><option value="Syrian Arab Republic" id="Syrian Arab Republic">Syrian Arab Republic</option><option value="Taiwan, Province of China" id="Taiwan, Province of China">Taiwan, Province of China</option><option value="Tajikistan" id="Tajikistan">Tajikistan</option><option value="Tanzania, United Republic" id="Tanzania, United Republic">Tanzania, United Republic</option><option value="Thailand" id="Thailand">Thailand</option><option value="Timor-Leste" id="Timor-Leste">Timor-Leste</option><option value="Togo" id="Togo">Togo</option><option value="Tokelau" id="Tokelau">Tokelau</option><option value="Tonga" id="Tonga">Tonga</option><option value="Trinidad and Tobago" id="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia" id="Tunisia">Tunisia</option><option value="Turkey" id="Turkey">Turkey</option><option value="Turkmenistan" id="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands" id="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu" id="Tuvalu">Tuvalu</option><option value="Uganda" id="Uganda">Uganda</option><option value="Ukraine" id="Ukraine">Ukraine</option><option value="United Arab Emirates" id="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom" id="United Kingdom">United Kingdom</option><option value="United States" id="United States">United States</option><option value="United States Minor Outlying Islands" id="United States Minor Outlying Islands">United States Minor Outlying Islands</option><option value="Uruguay" id="Uruguay">Uruguay</option><option value="UUzbekistanZ" id="Uzbekistan">Uzbekistan</option><option value="Vanuatu" id="Vanuatu">Vanuatu</option><option value="Venezuela, Bolivarian Republic" id="Venezuela, Bolivarian Republic">Venezuela, Bolivarian Republic</option><option value="Vietnam" id="Vietnam">Vietnam</option><option value="Virgin Islands, British" id="irgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S." id="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="Wallis and Futuna" id="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara" id="Western Sahara">Western Sahara</option><option value="Yemen" id="Yemen">Yemen</option><option value="Zambia" id="Zambia">Zambia</option><option value="Zimbabwe" id="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
                <div class="input-container">
                    <i class="i-icon fa fa-globe" style="font-size: 22px"></i>
                    <select class="input-field" name="continent" id="continent" required>
                        <option value="Africa">Africa</option>
                        <option value="Antarctica" selected>Antarctica</option>
                        <option value="Asia">Asia</option>
                        <option value="Australia">Australia</option>
                        <option value="Europe">Europe</option>
                        <option value="North America">North America</option>
                        <option value="South America">South America</option>
                    </select>
                </div>
                <label>Image max size is 15MB</label>
                <div class="input-container">
                    <i class="i-icon fa fa-upload" style="font-size: 22px"></i>
                    <label class="file-btn" style="margin: 0" for="img-file">
                        <div class="file-btn-text">
                        <p>File upload</p>
                    </div>
                </label>
                <input class="input-field" type="file" id="img-file" name="img-file">
                </div>
                <div class="input-container">
                    <button class="upload-btn" type="button" onclick="upload();">Upload</button>
                </div>
                <div style="width: 100%">
                    <label id="status"></label>
                    <progress style="width: 100%" min="0" max="100" value="0" id="img-progress"></progress>
                </div>
                <div class="add-spot-img-preview" id="img-preview">

                </div>
                <div class="input-container">
                    <textarea rows="8" name="description" placeholder="Spot description..." id="desc" required></textarea>
                </div>
                <div class="input-container">
                    <textarea rows="3" name="comment" placeholder="Comment..." id="comment" required></textarea>
                </div>
                <div class="input-container">
                    <i class="i-icon fa fa-user" style="font-size: 22px"></i>
                    <input class="input-field" type="text" name="name" placeholder="Name here..." id="user-name" required>
                </div>
                <div class="input-container">
                    <i class="i-icon fa fa-envelope" style="font-size: 22px"></i>
                    <input class="input-field" type="text" name="email" placeholder="E-mail..." id="user-mail" required>
                </div>
                <div class="input-container">
                    <button class="input-field submit-btn" type="button" name="submit" value="submit" onclick="SendSpot();">Add spot</button>
                </div>
                <input type="hidden" value="" name="the-hidden-one" id="status">
            </form>
        </div>
    </div>
</div>

<script>
    var imgArray = <?php if(isset($_SESSION['img_navne'])){echo json_encode($_SESSION['img_navne']);}else{echo "new Array()";} ?>;
</script>
<script>
    var map;
        var SpotMarker = [];

        var longitudeCord;
        var latitudeCord;

        var countries = document.getElementById("country").getElementsByTagName("option");
        var continent = document.getElementById("continent").getElementsByTagName("option");

        async function initMap() {
            var countryToContinent = await axios.get("http://skimspots.arpa/api/Country?shortnameAndContinent=true")
            console.log(countryToContinent.data['DE'])
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
                                            if(countryToContinent.data[part.short_name.toString()] == continent[j].value){
                                                continent[j].selected = "selected";
                                            }
                                        }                                        
                                    }
                                }                                
                            }else{
                                console.warn("FISK")
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

    function SendSpot (){
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
            url: "send-add-spot.php",
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
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1nHBTBTkJtRrWmpJb2ZxihkGiyG5FQO0&callback=initMap" async defer></script>