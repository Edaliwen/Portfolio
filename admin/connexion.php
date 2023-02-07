<?php
session_start();
// var_dump($_SESSION);
require_once("../controllers/accountController.php");

$controller = new AccountController;
if (isset($_POST["submit"])) {
    $result = $controller->login($_POST["email"], $_POST["password"]);
}

define("PAGE_TITLE", "Login");
?>
<?php include("../assets/inc/head.php"); ?>
<?php include("../assets/inc/header.php"); ?>

<main>
    <div class="container-fluid p-3">
        <h1>Connexion à l'espace administrateur</h1>
        <?php
        if (isset($result)) { ?>
        <div class= "alert alert-danger">
            <?= $result["message"]; ?>
        </div>
    
        <?php
        }
        ?>
        <!-- TODO: formulaire de connexion --> 
        <form class="row g-3" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword4">
            </div>
            <div class="col-12">
                <button type="submit" name= "submit" class="btn btn-dark">Sign in</button>
            </div>
        </form>
    </div>
</main>

<?php include("../assets/inc/footer.php");
/*
$result = $controller->create("amandine.valtat@gmail.com", "Princesse@mandine83");
var_dump($result);
*/
?>