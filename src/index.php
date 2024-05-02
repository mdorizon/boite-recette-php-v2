<?php require_once 'parts/header.php'; ?>

<div class="container w-25 mt-5">
  <h1>Nom d'utilisateur</h1>

  <form action="scripts/login.php" method="POST" class="mb-3 mt-3">
    <div class="mb-3">
      <input type="text" class="form-control" placeholder="Nom" name="name">
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

    <input type="submit" class="btn btn-primary w-100" value="se connecter">
  </form>
</div>

<?php require_once 'parts/footer.php'; ?>