<?php
session_start();

$recette_id = $_POST['id'];
if($_POST['status'] == 1) {
    $status = 0;
} else if($_POST['status'] == 0) {
    $status = 1;
}

// connect to db with PDO
$connectDatabase = new PDO("mysql:host=db;dbname=recipebox", "root", "admin");
// prepare request
$request = $connectDatabase->prepare("UPDATE recettes SET is_public= :is_public WHERE id= :id");
// bind params
$request->bindParam(':is_public', $status);
$request->bindParam(':id', $recette_id);
// execute request
$request->execute();

header('Location: ../recettes.php/#' . $recette_id);