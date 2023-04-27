const apiKey = "d626a3bd2b510176142a8c48fbc04b97";
const imgUrl = "https://image.tmdb.org/t/p/original";
const apiUrl = "https://api.themoviedb.org/3/";
let container = document.getElementById("container");

function fetchMoviesAndSeries(type, div) {
  fetch(apiUrl + type + "/popular?api_key=" + apiKey + "&language=fr-FR&page=1")
    .then((response) => response.json())
    .then((data) => {
      data.results.forEach((element) => {
        let DivMoviesOrSeries = document.getElementById(div);
        let imgMovies = document.createElement("img");
        let divItem = document.createElement("div");
        let divCaption = document.createElement("div");
        let titleMovie = document.createElement("h3");
        let mediaURL = document.createElement("a");

        imgMovies.style = "width : 200px";
        imgMovies.src = imgUrl + element.poster_path;
        // imgMovies.className = "d-block w-100";
        // divItem.className = "carousel-item";
        // divCaption.className = "carousel-caption";
        titleMovie.innerHTML = element.title;
        if (type == "movie") {
          titleMovie.innerHTML = element.title;
        } else {
          titleMovie.innerHTML = element.name;
        }
        mediaURL.href = "./php/details.php?id=" + element.id + "&type=" + type;
        // console.log(element);

        DivMoviesOrSeries.append(mediaURL);
        mediaURL.append(divItem);
        divItem.append(imgMovies, divCaption);
        divCaption.append(titleMovie);
      });
    });
}
fetchMoviesAndSeries("movie", "carouselMovies");
fetchMoviesAndSeries("tv", "carouselSeries");
