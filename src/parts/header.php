<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boîte à recettes</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"
    integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
  <nav class="text-center p-3 d-flex justify-content-between">
    <div>
      <a href="./index.php">Accueil</a>
      <a href="./public-recettes.php">Recettes publiques</a>
    </div>
    <div>
      <?php if(!isset($_SESSION['name'])) : ?>
        <a href="./signin.php">Signin</a>
        <a href="./signup.php">Signup</a>
      <?php endif; ?>
      <?php if(isset($_SESSION['name'])) : ?>
        <a href="./scripts/disconnect.php">Disconnect</a>
        <a href="./recettes.php">Vos recettes</a>
      <?php endif; ?>
      
    </div>

  </nav>