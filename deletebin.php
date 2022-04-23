<?php
require("db_connection.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	$sql = "DELETE FROM bin WHERE id = ?";        
    $q = $pdo->prepare($sql);

    $response = $q->execute(array($_GET['idBin']));  
	
	header("Location: account.php");  
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$sqlkl = "DELETE FROM comment WHERE id = ?";        
    $qkl = $pdo->prepare($sqlkl);

    $responsekl = $qkl->execute(array($_POST['idComment']));  

    header("Location: account.php");  
}
?>