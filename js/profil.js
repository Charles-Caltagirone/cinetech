let resultFavoris = document.getElementById("resultFavoris");
let favorisFilms = document.getElementById("favorisFilms");
let favorisSeries = document.getElementById("favorisSeries");

fetch("./traitement.php/")
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    data.forEach((element) => {
      console.log(data);
      fetch(
        apiUrl +
          element.type +
          "/" +
          element.id_media +
          "?api_key=" +
          apiKey +
          "&language=fr-FR"
      )
        .then((response) => {
          return response.json();
        })
        .then((data) => {
            // console.log(data);            
            let imgFavoris = document.createElement("img")
            let mediaURL = document.createElement("a");

            mediaURL.href = "../php/details.php?id=" + element.id_media + "&type=" + element.type;
            imgFavoris.style = "height : 30vh";
            imgFavoris.src = imgUrl + data.poster_path;
            mediaURL.append(imgFavoris);
            if(element.type == "movie"){
                favorisFilms.append(mediaURL);
            }else{
                favorisSeries.append(mediaURL);
            }
        });
    });
  });