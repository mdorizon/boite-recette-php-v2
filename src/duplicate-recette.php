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
$request = $connectDatabase->prepare("SELECT * FROM `recettes` WHERE id = :id");
// bindparams
$request->bindParam(':id', $_GET['id']);
// execute request
$request->execute();
// fetch all data from table posts
$result = $request->fetch(PDO::FETCH_ASSOC);
?>
<div class="container w-25 mt-5">
  <h1>dupliquer la recette</h1>

  <form action="scripts/recette-create-script.php" method="POST" class="mb-3 mt-3">
    <div class="mb-3">
      <input required type="text" class="form-control" placeholder="Nom de la recette" name="recette-name" value="<?= $result['name']; ?>">
      <input required type="text" class="form-control mt-3" placeholder="Lien de l'image" name="recette-img" value="<?= $result['img']; ?>">
      <textarea required class="form-control mt-3" placeholder="liste d'ingrédients (séparez avec un ; )" name="recette-ingredients"><?= $result['ingredients']; ?></textarea>
      <textarea required class="form-control mt-3" placeholder="étapes (séparez avec un ; )" name="recette-steps"><?= $result['steps']; ?></textarea>
    </div>

    <?php if(isset($_GET['error'])) : ?>
      <div class="alert alert-danger">
        <?php echo htmlspecialchars($_GET['error']); ?>
      </div>
      <?php endif; ?>
      
      <?php if(isset($_GET['success'])) : ?>
        <div class="alert alert-success">
          <?php echo htmlspecialchars($_GET['success']); ?>
        </div>
      <?php endif; ?>

    <input type="submit" class="btn btn-primary w-100" value="Envoyer">
  </form>
</div>

<?php require_once 'parts/footer.php'; ?>