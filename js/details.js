const apiKey = "d626a3bd2b510176142a8c48fbc04b97";
const imgUrl = "https://image.tmdb.org/t/p/original";
const apiUrl = "https://api.themoviedb.org/3/";
let container = document.getElementById("container");
let divDescription = document.getElementById("description");
let picture = document.getElementById("picture");
let casting = document.getElementById("casting");

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
  fetch(
    apiUrl +
      getType() +
      "/" +
      getId() +
      "?api_key=" +
      apiKey +
      "&language=fr-FR"
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
            img.style = "width:200px";
            picture.append(img);
          } else {
            if (
              element != "id" &&
              element != "imdb_id" &&
              element != "backdrop_path" &&
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
                divDescription.append(p);
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
        if (element.job == "Director") {
          //   console.log(element);
          p.innerText = element.original_name;
          let img = document.createElement("img");
          img.src = imgUrl + element.profile_path;
          img.style = "width:200px";
          casting.append(img, p);
        }
      });
      data.cast.forEach((element) => {
        // console.log(element);
        // console.log(element.job);
        let p = document.createElement("p");
        if (element.known_for_department == "Acting") {
          if (element.profile_path != null) {
            p.innerText = element.original_name;
            let img = document.createElement("img");
            img.src = imgUrl + element.profile_path;
            img.style = "width:200px";
            casting.append(img, p);
          }
        }
      });
    });
}

// if (data.status_code == 34) {
//   alert("INTROUVABLE");
// } else {
// if (getId() != "") {
if (getType() == "person") {
  fetchDetails();
} else {
  fetchDetails();
  fetchCasting();
}
// }
// } else {
// alert("NONNNN");
// }
