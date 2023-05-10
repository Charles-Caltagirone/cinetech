<?php
require "./bdd.php";

if (isset($_SESSION['id'])) {
    header('Location: ../index.php');
}

if (isset($_POST['submit'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = $_POST['password'];

    $recupUser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
    $recupUser->execute([$login]);
    $result = $recupUser->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $passwordHash = $result['password'];
        if ($recupUser->rowCount() > 0 && password_verify($password, $passwordHash)) {
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $_SESSION = $result;
            // header("Location: ../index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
    <section class="">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12 col-xl-11" id="formInscription">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1" id="inputInscription">
                                        <form class="mx-1 mx-md-4" method="post" id="submitInscription">

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" id="login" class="form-control" name="login" />
                                                    <label class="form-label" for="form3Example1c">Login</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" id="password" class="form-control" name="password" />
                                                    <label class="form-label" for="form3Example4c">Password</label>
                                                </div>
                                            </div>
                                            <p id="message" class="text-danger text-center"></p>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <input type="submit" id="button" name="submit" class="btn btn-primary btn-lg" value="Connexion">
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    var_dump($_SESSION['id']);
    ?>
    <script src="../js/search.js"></script>
</body>

</html>