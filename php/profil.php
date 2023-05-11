<?php
require "./bdd.php";
$idUser = $_SESSION['id'];
$login = $_SESSION['login'];

if (!isset($_SESSION['id'])) {
    header("Location:../index.php");
}

// $recupUser = $bdd->prepare("SELECT * FROM favoris WHERE id_utilisateur = ?");
// $recupUser->execute([$idUser]);
// $result = $recupUser->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
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
        <h1>Favoris de
            <?php
            echo $login;
            ?>
        </h1>
        <div class="" id="resultFavoris">
            <div class="details d-flex" id="favorisFilms"></div>
            <div class="details d-flex" id="favorisSeries"></div>
        </div>
    </main>

    <script src="../js/search.js"></script>
    <script src="../js/profil.js"></script>
</body>

</html>