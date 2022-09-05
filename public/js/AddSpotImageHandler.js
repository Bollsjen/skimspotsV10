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
    ImagesUpdate(JSON.parse(e.target.responseText)['success']);
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
    for (var i = 0; i < imgArray.length; i++) {
        _("img-preview").appendChild(CreateImageHolder(imgArray[i], i))
    }
}

function ImagesIsDelete(){
    imgArray = new array();
    UpdateImgList();
}
function ImgSlet(_billede){
    $.ajax({
        url: "/add-spot",
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

function CreateImageHolder(img, id){
    let holder = document.createElement("div")
    holder.className = "img-holder"

    let image = document.createElement('img')
    image.src = "/public/img/add-spot/" + img
    image.style.width = "75px"
    image.style.height = "75px"
    
    let removeBtn = document.createElement("a")
    removeBtn.className = "img-slet-ikon"
    removeBtn.addEventListener("click",ImgSlet(id))

    let icon = document.createElement("i")
    icon.className = "img-slet fa fa-times"
    icon.style.color = "red"
    icon.style.fontSize = "24px"

    removeBtn.appendChild(icon)
    holder.appendChild(removeBtn)
    holder.appendChild(image)

    console.log(holder)

    return holder
}