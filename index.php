<?php
require "./php/bdd.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cinetech</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/9a09d189de.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <?php
        require("./php/header-index.php")
        ?>
    </header>
    <main>
        <div class="" id="container">
            <div id="filmsIndex">
                <h2>Films populaires :</h2>
                <div class="details d-flex" id="scrollMovies"></div>
            </div>
            <div id="seriesIndex">
                <h2>Séries populaires :</h2>
                <div class="details d-flex" id="scrollSeries"></div>
            </div>
        </div>
    </main>
    <script src="./js/search.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>