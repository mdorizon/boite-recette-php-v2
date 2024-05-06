<?php
  session_start();
  if(!isset($_SESSION['name'])) {
    header("Location: ../index.php");
  }
?>

<?php require_once 'parts/header.php'; ?>

<div class="container w-25 mt-5">
  <h1>Nouvelle recette</h1>

  <form action="scripts/recette-create-script.php" method="POST" class="mb-3 mt-3">
    <div class="mb-3">
      <input required type="text" class="form-control" placeholder="Nom de la recette" name="recette-name">
      <input required type="text" class="form-control mt-3" placeholder="Lien de l'image" name="recette-img">
      <div class="form-check">
        <input type="checkbox" class="form-check-input mt-3" value="1" name="is-public" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Recette publique ?
        </label>
      </div>
      <textarea required class="form-control mt-3" placeholder="liste d'ingrédients (séparez avec un ; )" name="recette-ingredients"></textarea>
      <textarea required class="form-control mt-3" placeholder="étapes (séparez avec un ; )" name="recette-steps"></textarea>
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