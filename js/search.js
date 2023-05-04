const apiKey = "d626a3bd2b510176142a8c48fbc04b97";
const imgUrl = "https://image.tmdb.org/t/p/original";
const apiUrl = "https://api.themoviedb.org/3/";
let starIcon = '<i class="fa-solid fa-star" style="color: #f6e713;"></i>'

const search = document.getElementById("searchBar"); //le input
const result = document.getElementById("result"); //les résultats 
// console.log("hello");

if (search) {
  search.addEventListener("keyup", () => {
    console.log("tape");
    result.innerHTML = "";
    if (search.value != "") {
      fetch(
        apiUrl +
          "search/multi?api_key=" +
          apiKey +
          "&language=fr-FR&page=1&query=" +
          search.value
      )
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          console.log(data);
          data.results.forEach((element) => {
            // console.log(element.nom);
            let mediaURL = document.createElement("a");
            let resultsSearch = document.createElement("p");

            mediaURL.href =
              "./details.php?id=" + element.id + "&type=" + element.media_typ;e
            if (element.media_type == "movie") {
              mediaURL.innerText = element.title + " (Film)";
            } else if (element.media_type == "tv") {
              mediaURL.innerText = element.name + " (Série)";
            } else if (element.media_type == "person") {
              mediaURL.innerText = element.name + " (People)";
            }

            result.append(resultsSearch);
            resultsSearch.append(mediaURL);
          });
        });
    }
  });
}
