<?php
// Commencer par l'appel du controller
require("./controllers/projectController.php");

$controller = new ProjectController;
$projects = $controller->readAll();

define("PAGE_TITLE", "Projets");

?>

<?php include("./assets/inc/head.php"); ?>
<?php include("./assets/inc/header.php"); ?>

<main>
    <div class="container-fluid">
        <h1>Mes projets</h1>
        <div class="row">
        <?php
            // var_dump($projects);
            foreach($projects as $project){
        ?>   
            <div class="col">
                <div class="card" style="width: 18rem;">
                <img src="./assets/img/projects/<?= $project->cover ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/projet/<?= $project->id_project; ?>" class="link-secondary">
                            <?= $project->name ?></a></h5>
                        <p class="card-text"><?= $project->description ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Date de début: <?= $project->date_start ?></li>
                        <li class="list-group-item">Date de fin: <?= $project->date_end ?></li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= $project->link_site ?>" class="card-link text-decoration-none">Lien vers le projet</a>
                        <a href="<?= $project->link_site ?>" class="card-link text-decoration-none"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
        </div>        
    </div>
</main>

<?php include("./assets/inc/footer.php"); ?>