<?php
require "./bdd.php";
ob_start('ob_gzhandler');
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
    <!-- <script src="../js/details.js" defer></script> -->

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
                <div id="favorisDiv">
                    <form action="" id="favorisForm" method="post">
                        <!-- <button id="favorisBtn" name="favorisBtn" type="submit"> -->
                        <!-- <i id="favorisOff" class="fa-regular fa-star"></i></button> -->
                    </form>
                </div>
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
    <?php
    if (isset($_SESSION['id'])) {
        $id_media = $_GET['id'];
        $type = $_GET['type'];
        $id_utilisateur = $_SESSION['id'];

        $recup = $bdd->prepare("SELECT * FROM `favoris` WHERE id_utilisateur = ? AND id_media = ?");
        $recup->execute([$_SESSION['id'], $id_media]);
        $favoris = $recup->fetch(PDO::FETCH_ASSOC);
    ?>
        <script>
            let favorisBtn = document.createElement("button");
            favorisBtn.setAttribute("type", "submit");
            favorisBtn.setAttribute("name", "favorisBtn");
            let favorisIcon = document.createElement("i");
            favorisIcon.setAttribute("id", "favorisIcon")
            favorisBtn.append(favorisIcon);
            favorisForm.append(favorisBtn);
        </script>

        <?php
        if (isset($_POST['favorisBtn'])) {
            if (empty($favoris)) {
                $stmt = $bdd->prepare("INSERT INTO favoris (`id_utilisateur` ,`id_media` ,`type` ) VALUES (?,?,?) ");
                $stmt->execute(array($id_utilisateur, $id_media, $type));
                header("Location: ./details.php?id=" . $id_media . "&type=" . $type);
            } else {
                $stmt = $bdd->prepare("DELETE FROM favoris WHERE id_utilisateur = ? AND id_media = ?");
                $stmt->execute([$id_utilisateur, $id_media]);
                header("Location: ./details.php?id=" . $id_media . "&type=" . $type);
            }
        }

        if (empty($favoris)) {
        ?>
            <script>
                favorisIcon.className = "fa-regular fa-heart";
                favorisBtn.innerHTML += " Ajouter aux favoris"
            </script>
        <?php
        } else {
        ?>
            <script>
                favorisIcon.className = "fa-solid fa-heart";
                favorisBtn.innerHTML += " Retirer des favoris"
            </script>
    <?php
        }
    }
    ?>
    <script src="../js/search.js"></script>
    <script src="../js/details.js"></script>
</body>

</html>