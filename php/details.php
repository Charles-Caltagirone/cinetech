<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/9a09d189de.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <?php
        require("./header-others.php");
        ?>
    </header>
    <main>
        <div class="" id="container">
            <div class="enteteDesc d-flex">
                <div class="" id="picture"></div>
                <div id="description"></div>
                <div id="favorisDiv"><button id="favorisBtn" name="favorisBtn" type="submit"></button></div>
            </div>
            <div class="directorDiv detailsMedia" id="directorDiv">
                <h3>
                    Réalisateur :
                </h3>
                <div class="d-flex" id="director">
                </div>
            </div>
            <div class="castingDIV detailsMedia" id="castingDiv">
                <h3>
                    Casting :
                </h3>
                <div class="d-flex w-75 details overflow-auto" id="casting"></div>
            </div>
            <div class="similarDIV detailsMedia" id="similarDiv">
                <h3>
                    Similaires :
                </h3>
                <div class="d-flex w-75 details overflow-auto" id="similar"></div>
            </div>
        </div>
    </main>
    <!-- <script src="../js/search.js"></script> -->
    <script src="../js/details.js"></script>
</body>

</html>