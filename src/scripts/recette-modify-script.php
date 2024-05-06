<?php
session_start();

$recette_name = $_POST['recette-name'];
$recette_img = $_POST['recette-img'];
$recette_ingredients = $_POST['recette-ingredients'];
$recette_steps = $_POST['recette-steps'];
$recette_id = $_POST['id'];
if(empty($_POST['is-public'])) {
  $public = 0;
} else if($_POST['is-public'] == 1) {
  $public = 1;
}

if(empty($recette_name)) {
  header('Location: ../modify-recette.php?id=' . $recette_id . '&error=Veuillez renseigner un nom');
  die();
}
if(empty($recette_img)) {
  header('Location: ../modify-recette.php?id=' . $recette_id . '&error=Veuillez renseigner une image');
  die();
}
if(empty($recette_ingredients)) {
  header('Location: ../modify-recette.php?id=' . $recette_id . '&error=Veuillez renseigner les ingrédients');
  die();
}
if(empty($recette_steps)) {
  header('Location: ../modify-recette.php?id=' . $recette_id . '&error=Veuillez renseigner les étapes');
  die();
}

  // connect to db with PDO
  $connectDatabase = new PDO("mysql:host=db;dbname=recipebox", "root", "admin");
  // prepare request
  $request = $connectDatabase->prepare("UPDATE recettes SET name= :name, ingredients= :ingredients, steps= :steps, img= :img, is_public= :is_public WHERE id= :id");
  // bind params
  $request->bindParam(':name', $recette_name);
  $request->bindParam(':ingredients', $recette_ingredients);
  $request->bindParam(':steps', $recette_steps);
  $request->bindParam(':img', $recette_img);
  $request->bindParam(':is_public', $public);
  $request->bindParam(':id', $recette_id);
  // execute request
  $request->execute();

  header("Location: ../recettes.php");