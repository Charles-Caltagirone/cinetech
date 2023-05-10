<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php"><img src="../assets/iconeC.png" width="30px" alt="icone cinetech"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./films.php">Films</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./series.php">Séries</a>
                </li>
                <?php
                if (!isset($_SESSION['id'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./connexion.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./inscription.php">Inscription</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./profil.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./deco.php"><i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i></a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" id="searchBar" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                <div class="position-absolute" id="result"></div>
                <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
            </form>
        </div>
    </div>
</nav>