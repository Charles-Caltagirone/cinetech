let container = document.getElementById("container");

function fetchMoviesAndSeries(type, div) {
  fetch(apiUrl + type + "/popular?api_key=" + apiKey + "&language=fr-FR&page=1")
    .then((response) => response.json())
    .then((data) => {
      data.results.forEach((element) => {
        let DivMoviesOrSeries = document.getElementById(div);
        let imgMovies = document.createElement("img");
        let divItem = document.createElement("div");
        divItem.setAttribute("class", "resultMedia")
        divItem.setAttribute("id", "resultMediaIndex")
        let divCaption = document.createElement("div");
        let titleMovie = document.createElement("h5");
        let mediaURL = document.createElement("a");

        // titleMovie.style("class", "resultMedia")
        imgMovies.src = imgUrl + element.poster_path;
        // imgMovies.className = "d-block w-100";
        if (type == "movie") {
          titleMovie.innerHTML = starIcon + element.vote_average;
        } else {
          titleMovie.innerHTML = starIcon + element.vote_average;
        }
        mediaURL.href = "./php/details.php?id=" + element.id + "&type=" + type;
        // console.log(element);

        DivMoviesOrSeries.append(divItem);
        mediaURL.append(imgMovies);
        divItem.append(mediaURL, divCaption);
        divCaption.append(titleMovie);
      });
    });
}
fetchMoviesAndSeries("movie", "scrollMovies");
fetchMoviesAndSeries("tv", "scrollSeries");
