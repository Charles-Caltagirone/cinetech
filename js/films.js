let select = document.getElementById("categories-select");
// let listCatDiv = document.getElementById("listCat");

fetch(apiUrl + "genre/movie/list?api_key=" + apiKey + "&language=fr-FR")
  .then((response) => response.json())
  .then((data) => {
    data.genres.filter(function (resultats) {
      let option = document.createElement("option");
      option.setAttribute("value", resultats.id);
      option.innerHTML = resultats.name;
      select.append(option);
    });
  });

function fetchGenres(type, div) {
  select.addEventListener("change", () => {
    films.innerHTML = ""; // réinitialiser la liste à chaque nouveau choix
    const categorie = select.value;
    fetch(
      apiUrl +
        "discover/" +
        type +
        "?api_key=" +
        apiKey +
        "&language=fr-FR&sort_by=popularity.desc&with_genres=" +
        categorie
    )
      .then((response) => response.json())
      .then((data) => {
        data.results.forEach((element) => {
          //Traitement + affichage des données
          if (categorie != "") {
            let mediaDiv = document.getElementById(div);
            let p = document.createElement("p");
            let img = document.createElement("img");
            let mediaURL = document.createElement("a");
            mediaURL.setAttribute("class", "resultMedia")

            img.src =
              "https://image.tmdb.org/t/p/original" + element.poster_path;
            mediaURL.href =
              "../php/details.php?id=" + element.id + "&type=" + type;

            mediaURL.append(img);
            mediaDiv.append(mediaURL);
          } else {
            films.innerHTML = "";
          }
        });
      });
  });
}

fetchGenres("movie", "films");
