<?php
session_start();

$recette_name        = $_POST['recette-name'];
$recette_img         = $_POST['recette-img'];
$recette_ingredients = $_POST['recette-ingredients'];
$recette_steps       = $_POST['recette-steps'];
if(empty($_POST['is-public'])) {
  $is_public = 0;
} else if($_POST['is-public'] == 1) {
  $is_public = 1;
}

if(empty($recette_name)) {
  header("Location: ../new-recette.php?error=Veuillez renseigner un nom");
  die();
}
if(empty($recette_img)) {
  header("Location: ../new-recette.php?error=Veuillez renseigner une image");
  die();
}
if(empty($recette_ingredients)) {
  header("Location: ../new-recette.php?error=Veuillez renseigner les ingrédients");
  die();
}
if(empty($recette_steps)) {
  header("Location: ../new-recette.php?error=Veuillez renseigner les étapes");
  die();
}

  // connect to db with PDO
  $connectDatabase = new PDO("mysql:host=db;dbname=recipebox", "root", "admin");
  // prepare request
  $request = $connectDatabase->prepare("INSERT INTO recettes (name, ingredients, steps, img, user_id, is_public) VALUES (:name, :ingredients, :steps, :img, :user_id, :is_public)");
  // bind params
  $request->bindParam(':name', $recette_name);
  $request->bindParam(':ingredients', $recette_ingredients);
  $request->bindParam(':steps', $recette_steps);
  $request->bindParam(':img', $recette_img);
  $request->bindParam(':user_id', $_SESSION["id"]);
  $request->bindParam(':is_public', $is_public);
  // execute request
  $request->execute();

  header("Location: ../recettes.php");