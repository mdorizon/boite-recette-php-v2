<?php 

if(empty($_POST['name'])) {
  header("Location: ../index.php?error=Entrez un nom d'utilisateur !");
  die();
}

// connect to db
$connectDatabase = new PDO("mysql:host=db;dbname=recipebox", "root", "admin");
// prepare request
$request = $connectDatabase->prepare("SELECT * FROM `users` WHERE name = :name");
// bindparams
$request->bindParam(':name', $_POST['name']);
// execute request
$request->execute();
$result = $request->fetch(PDO::FETCH_ASSOC);

if(!$result) {
  header("Location: ../index.php?error=Utilisateur non trouvé !");
  die();
}

session_start();
$_SESSION["name"] = $result['name'];
$_SESSION["id"] = $result['id'];

header("Location: ../recettes.php");