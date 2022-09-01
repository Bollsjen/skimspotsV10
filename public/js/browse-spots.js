const url = "http://skimspots.arpa/api/Spot";

let page = 0
let limit = 15

async function SortSpots(){
    const countryFilter = document.querySelector("[spot-country-filter]").value
    const typeFilter = document.querySelector("[spot-type-filter]").value
    const spotSorting = document.querySelector("[spot-sorting]").value

    //console.log(typeFilter)

    let parameters = "?limit=" + limit + "&offset=" + (limit * page)

    if(countryFilter != ""){
        parameters = parameters + "&country="+countryFilter
    }

    if(typeFilter != ""){
        parameters = parameters + "&type="+typeFilter
    }

    parameters = parameters + "&spotSorting="+spotSorting

    console.log(parameters)

    let newUrl = url + parameters

    const response = await axios.get(newUrl)
    const spots = await response.data
    
    //console.log(await response.status)

    //console.log(spots);

    const container = document.getElementById("browse-spot-conatiner")
    container.innerHTML = ""
    for(let i = 0; i < limit; i++){
        if(typeof spots[i] != "undefined"){
            container.append(CreateCards(spots[i]))
        }
    }


}

function CreateCards(spot){
    const aCard = document.createElement("a")
    aCard.classList.add("spot-card")
    aCard.href = "/spot?spotID=" + spot.id

    const img = document.createElement("img")
    if(spot.images[0] != undefined){
        img.src = "/public/img/spots/"+spot.images[0].image
    }
    else{
        img.src = "/public/img/spots/"
    }


    const bodyDiv = document.createElement("div")
    bodyDiv.classList.add("pot-card-body")

    const title = document.createElement("p")
    title.classList.add("spot-card-title")
    title.innerHTML = spot.title

    const typeDiv = document.createElement("div")
    typeDiv.classList.add("spot-card-info")

    const type = document.createElement("p")
    type.innerHTML = "Type: " + spot.type

    const geographyDiv = document.createElement("div")
    geographyDiv.classList.add("spot-card-info")

    const geographyText = document.createElement("p")
    geographyText.innerHTML = spot.state.country.name + ", " + spot.state.country.continent

    const footer = document.createElement("div")
    footer.classList.add("spot-card-footer")

    const ratingText = document.createElement("p")
    ratingText.innerHTML = "Spot rating:"

    const ratingDiv = document.createElement("div")
    ratingDiv.classList.add("spot-card-rating")

    const star1 = document.createElement("i")
    const star2 = document.createElement("i")
    const star3 = document.createElement("i")
    const star4 = document.createElement("i")
    const star5 = document.createElement("i")

    if(spot.rating > 0.5 && spot.rating < 1.5){
        
        star1.className = "fa fa-star"
        star1.style.color = "#777"
        star1.style.fontSize = "24px"

        
        star2.className = "fa fa-star"
        star2.style.color = "#777"
        star2.style.fontSize = "24px"

        
        star3.className = "fa fa-star"
        star3.style.color = "#777"
        star3.style.fontSize = "24px"

        
        star4.className = "fa fa-star"
        star4.style.color = "#777"
        star4.style.fontSize = "24px"

        
        star5.className ="fa fa-star"
        star5.style.color = "#E5E500"
        star5.style.fontSize = "24px"
    } else if(spot.rating > 1.5 && spot.rating < 2.5){
        star1.className = "fa fa-star"
        star1.style.color = "#777"
        star1.style.fontSize = "24px"

        star2.className = "fa fa-star"
        star2.style.color = "#777"
        star2.style.fontSize = "24px"

        star3.className = "fa fa-star"
        star3.style.color = "#777"
        star3.style.fontSize = "24px"

        star4.className = "fa fa-star"
        star4.style.color = "#E5E500"
        star4.style.fontSize = "24px"

        star5.className = "fa fa-star"
        star5.style.color = "#E5E500"
        star5.style.fontSize = "24px"
    } else if(spot.rating > 2.5 && spot.rating < 3.5){
        star1.className = "fa fa-star"
        star1.style.color = "#777"
        star1.style.fontSize = "24px"

        star2.className = "fa fa-star"
        star2.style.color = "#777"
        star2.style.fontSize = "24px"

        star3.className ="fa fa-star"
        star3.style.color = "#E5E500"
        star3.style.fontSize = "24px"

        star4.className = "fa fa-star"
        star4.style.color = "#E5E500"
        star4.style.fontSize = "24px"

        star5.className = "fa fa-star"
        star5.style.color = "#E5E500"
        star5.style.fontSize = "24px"
    } else if(spot.rating > 3.5 && spot.rating < 4.5){
        star1.className = "fa fa-star"
        star1.style.color = "#777"
        star1.style.fontSize = "24px"

        star2.className = "fa fa-star"
        star2.style.color = "#E5E500"
        star2.style.fontSize = "24px"

        star3.className = "fa fa-star"
        star3.style.color = "#E5E500"
        star3.style.fontSize = "24px"

        star4.className = "fa fa-star"
        star4.style.color = "#E5E500"
        star4.style.fontSize = "24px"

        star5.className = "fa fa-star"
        star5.style.color = "#E5E500"
        star5.style.fontSize = "24px"
    } else if(spot.rating > 4.5){
        star1.className = "fa fa-star"
        star1.style.color = "#E5E500"
        star1.style.fontSize = "24px"

        star2.className = "fa fa-star"
        star2.style.color = "#E5E500"
        star2.style.fontSize = "24px"

        star3.className = "fa fa-star"
        star3.style.color = "#E5E500"
        star3.style.fontSize = "24px"

        star4.className = "fa fa-star"
        star4.style.color = "#777"
        star4.style.fontSize = "24px"

        star5.className = "fa fa-star"
        star5.style.color = "#777"
        star5.style.fontSize = "24px"
    } else {
        star1.className = "fa fa-star"
        star1.style.color = "#777"
        star1.style.fontSize = "24px"

        star2.className = "fa fa-star"
        star2.style.color = "#777"
        star2.style.fontSize = "24px"

        star3.className = "fa fa-star"
        star3.style.color = "#777"
        star3.style.fontSize = "24px"

        star4.className = "fa fa-star"
        star4.style.color = "#777"
        star4.style.fontSize = "24px"

        star5.className = "fa fa-star"
        star5.style.color = "#777"
        star5.style.fontSize = "24px"
    }

    ratingDiv.append(star1)
    ratingDiv.append(star2)
    ratingDiv.append(star3)
    ratingDiv.append(star4)
    ratingDiv.append(star5)

    footer.append(ratingText)
    footer.append(ratingDiv)

    geographyDiv.append(geographyText)

    typeDiv.append(type)

    bodyDiv.append(title)

    aCard.append(img)
    aCard.append(bodyDiv)
    aCard.append(typeDiv)
    aCard.append(geographyDiv)
    aCard.append(footer)

    return aCard
}