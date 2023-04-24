let container = document.getElementById("container");
let section2 = document.getElementById("section2");
let carousel = document.getElementById("carousel");

// let imgMovies = document.getElementById("imgMovies");

// $("#test").on("click", function () {
fetch(
  "https://api.themoviedb.org/3/movie/popular?api_key=d626a3bd2b510176142a8c48fbc04b97&language=en-US&page=1d626a3bd2b510176142a8c48fbc04b97"
)
  .then((response) => response.json())
  .then((data) => {
    let result = data.results.filter(function (element) {
      // console.log("je suis là");
      // console.log(element.title);
      // console.log(element.poster_path);
      let imgMovies = document.createElement("img");
      let divItem = document.createElement("div");
      let divCaption = document.createElement("div");
      let titleMovie = document.createElement("h3");

      imgMovies.src =
        "https://image.tmdb.org/t/p/original" + element.poster_path;
      //   imgMovies.style = "width : 100px";
      //   divMovies.append(imgMovies);
      //   carousel.append(imgMovies);
      imgMovies.className = "d-block w-100";
      divItem.className = "item";
      divCaption.className = "carousel-caption";
      titleMovie.innerText = element.title;
      divCaption.append(titleMovie);
      divItem.append(imgMovies, divCaption);
      carousel.append(divItem);
      console.log(divItem);
      //   divMovies.innerHTML += "<p>" + element.title + "</p>";
    });
  });
