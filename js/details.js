let container = document.getElementById("container");
let divDescription = document.getElementById("description");
let picture = document.getElementById("picture");
let casting = document.getElementById("casting");
let director = document.getElementById("director");
let similar = document.getElementById("similar");
let similarDiv = document.getElementById("similarDiv");
let directorDiv = document.getElementById("directorDiv");
let castingDiv = document.getElementById("castingDiv");
let favorisDiv = document.getElementById("favorisDiv");
let favorisForm = document.getElementById("favorisForm");

function getId() {
  let URL = window.location.href;
  let idAndType = URL.split("=")[1];
  let id = idAndType.split("&")[0];
  //   console.log(id);
  return id;
}
function getType() {
  let URL = window.location.href;
  let type = URL.split("=")[2];
  //   console.log(type);
  return type;
}
function fetchDetails() {
  fetch(    apiUrl +      getType() +      "/" +      getId() +      "?api_key=" +      apiKey +      "&language=fr-FR"
  )
    .then((response) => response.json())
    .then((data) => {
      //   console.log(data);
      for (let element in data) {
        // console.log(data);
        //   console.log(element);
        //   console.log(data[element]);
        let p = document.createElement("p");
        if (
          (typeof data[element] === "string") ^
          (typeof data[element] === "number")
        ) {
          if (
            // element == "backdrop_path" ||
            element == "poster_path" ||
            element == "profile_path"
          ) {
            let img = document.createElement("img");
            img.src = imgUrl + data[element];
            img.style = "width:300px; margin:1em 2em 2em 1em; border-radius:10px";
            picture.append(img);
          } else {
            if (
              element != "id" &&
              element != "imdb_id" &&
              element != "backdrop_path" &&
              element != "original_language" &&
              element != "homepage" &&
              element != "popularity" &&
              element != "status" &&
              element != "tagline" &&
              element != "original_title" &&
              element != "vote_count" &&
              element != "gender"
            ) {
              if (element == "budget") {
                let budgetNb = data[element] / 1000000;
                p.innerHTML =
                  "<b>" +
                  element +
                  "</b>" +
                  " : " +
                  budgetNb +
                  " millions de dollars.";
                divDescription.append(p);
              } else {
                p.innerHTML = "<b>" + element + "</b>" + ":" + data[element];
                // favorisBtn.innerHTML = starIcon + " Ajouter aux favoris";
                divDescription.append(p, favorisDiv);
              }
            }
          }
        }
      }
    });
  //   .catch((error) => console.error(error));
}

function fetchCasting() {
  fetch(
    apiUrl +
      getType() +
      "/" +
      getId() +
      "/credits?api_key=" +
      apiKey +
      "&language=fr-FR"
  )
    .then((response) => response.json())
    .then((data) => {
      data.crew.forEach((element) => {
        // console.log(element.job);
        let p = document.createElement("p");
        let mediaURL = document.createElement("a");
        mediaURL.href = "./details.php?id=" + element.id + "&type=person";
        if (element.job == "Director") {
          //   console.log(element);
          p.innerText = element.original_name;
          let img = document.createElement("img");
          img.src = imgUrl + element.profile_path;
          img.style = "width:100px; border-radius:5px; margin:5px";
          mediaURL.append(img, p);
          director.append(mediaURL);
        }
      });

      data.cast.forEach((element) => {
        // console.log(element);
        // console.log(element.job);
        let p = document.createElement("p");
        let mediaURL = document.createElement("a");
        mediaURL.href = "./details.php?id=" + element.id + "&type=person";
        if (element.known_for_department == "Acting") {
          if (element.profile_path != null) {
            p.innerText = element.original_name;
            let img = document.createElement("img");
            img.src = imgUrl + element.profile_path;
            img.style = "width:100px; border-radius:5px; margin:5px";
            mediaURL.append(img, p);
            casting.append(mediaURL);
          }
        }
      });
    });
}

function fetchSimilar() {
  fetch(
    apiUrl +
      getType() +
      "/" +
      getId() +
      "/similar?api_key=" +
      apiKey +
      "&language=fr-FR"
  )
    .then((response) => response.json())
    .then((data) => {
      data.results.forEach((element) => {
        // console.log(element);
        let img = document.createElement("img");
        let h2Div = document.createElement("h2");
        let mediaURL = document.createElement("a");
        mediaURL.href = "./details.php?id=" + element.id + "&type=" + getType();
        h2Div.innerText = "Similaires :";
        img.src = imgUrl + element.poster_path;
        img.style = "width:100px; border-radius:5px; margin:5px";
        mediaURL.append(img);
        similar.append(mediaURL);
      });
    });
}


if (getType() == "person") {
  fetchDetails();
  directorDiv.style.display = "none";
  castingDiv.style.display = "none";
  similarDiv.style.display = "none";
} else {
  fetchDetails();
  fetchCasting();
  fetchSimilar();
}
