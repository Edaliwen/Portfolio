<?php
session_start();
define("PAGE_TITLE", "Accueil admin");

require_once("../controllers/accountController.php");

$accountController = new AccountController;

// Permet de vérifier que l'utilisateur est connecté
$accountController->isLogged();
?>

<?php include("../assets/inc/head.php"); ?>
<?php include("../assets/inc/header.php"); ?>

<main>
    <div class="container-fluid p-3">
        <p>Votre email : <?= $_SESSION["email"] ?></p>
        <div class="d-flex justify-content-around">
            <a class= "btn btn-outline-success" href="./admin/ajoutProjet.php">Ajouter un projet</a>
            <a class= "btn btn-outline-success" href="./admin/ajoutCompetence.php">Ajouter une compétence</a>
            </div>
    </div>
</main>

<?php include("../assets/inc/footer.php"); ?>