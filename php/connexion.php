<?php
require "./bdd.php";

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <header>
        <?php
        require("./header-others.php");
        ?>
    </header>
    <main>
        <form method="POST" action="" id="submitConnexion">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <p id="message" class="text-danger text-center"></p>
            <input type="submit" class="btn btn-primary" value="Se connecter" name="submit" id="button">
        </form>
    </main>
    <?php
    var_dump($_SESSION);
    ?>
    <script src="../js/search.js"></script>
</body>

</html>