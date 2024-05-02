<?php
  session_start();
  if(!isset($_SESSION['name'])) {
    header("Location: ../index.php");
  }
?>

<?php require_once 'parts/header.php'; ?>

<?php 
// connect to db
$connectDatabase = new PDO("mysql:host=db;dbname=recipebox", "root", "admin");
// prepare request
$request = $connectDatabase->prepare("SELECT * FROM `recettes` WHERE user_id = :id ORDER BY `id` DESC");
// bindparams
$request->bindParam(':id', $_SESSION['id']);
// execute request
$request->execute();
// fetch all data from table posts
$result = $request->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- show data in html -->
<section>
  <?php if (count($result) == 0) : ?>
    <div class="text-center">
      <h2 class="mt-5">Bonjour <?= $_SESSION['name']; ?>, Soyez le premier à poster une recette</h2>
      <a class="btn btn-primary mt-4" href="./new-recette.php">Ajouter</a>
    </div>
  <?php else: ?>
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
          <p>Liste des ingrédients :</p>
          <ul>
            <?php foreach($ingredients as $ingredient){ echo('<li>' . $ingredient . '</li>'); } ?>
          </ul>
          <p>Etapes :</p>
          <ol type="1">
            <?php foreach($steps as $step){ echo('<li>' . $step . '</li>'); } ?>
          </ol>
          <a href="./scripts/recette-remove-script.php?id=<?= $recette['id'] ?>">
            <i class="fa-solid fa-trash" style="color: red;"></i>
          </a>
          <a href="./modify-recette.php?id=<?= $recette['id'] ?>">
            <i class="fa-solid fa-pen-to-square" style="color: blue;"></i>
          </a>
          <a href="./duplicate-recette.php?id=<?= $recette['id'] ?>">
            <i class="fa-solid fa-clone" style="color: blue;"></i>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="text-center mb-5">
      <h2 class="mt-5">Bonjour <?= $_SESSION['name']; ?>, ajoutez une nouvelle recette ici !</h2>
      <a class="btn btn-primary mt-4" href="./new-recette.php">Ajouter</a>
    </div>
  <?php endif; ?>
</section>

<?php require_once 'parts/footer.php'; ?>