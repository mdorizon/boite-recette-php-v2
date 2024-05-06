<?php
    session_start();
?>

<?php require_once 'parts/header.php'; ?>

<?php 
// connect to db
$connectDatabase = new PDO("mysql:host=db;dbname=recipebox", "root", "admin");
// prepare request
$request = $connectDatabase->prepare("SELECT recettes.*, users.name AS username FROM recettes INNER JOIN users ON recettes.user_id = users.id WHERE recettes.is_public = 1");
// execute request
$request->execute();
// fetch all data from table posts
$result = $request->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- show data in html -->
<section>
    <?php foreach ($result as $recette) : ?>
        <?php
            // liste des ingredients
            $ingredients = preg_split('/;\s*/', $recette['ingredients']);
            // liste des étapes
            $steps = preg_split('/;\s*/', $recette['steps']);
            
        ?>
        <div class="d-flex mt-5 mb-5">
        <img class="w-50" src="<?= $recette['img'] ?>" alt="recette<?= $recette['id']?>">
        <div class="ms-5 mt-5">
            <h2><?= $recette['name'] ?></h2>
            <h3>Recette de : <?= $recette['username'] ?></h3>
            <p>Liste des ingrédients :</p>
            <ul>
                <?php foreach($ingredients as $ingredient){ echo('<li>' . $ingredient . '</li>'); } ?>
            </ul>
            <p>Etapes :</p>
            <ol type="1">
                <?php foreach($steps as $step){ echo('<li>' . $step . '</li>'); } ?>
            </ol>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?php require_once 'parts/footer.php'; ?>