<?php
session_start();
// connect to db with PDO
$connectDatabase = new PDO("mysql:host=db;dbname=recipebox", "root", "admin");
// prepare request
$request = $connectDatabase->prepare("DELETE FROM recettes WHERE id = :id");
// bind params
$request->bindParam(':id', $_GET['id']);
// execute request
$request->execute();

header("Location: ../recettes.php");