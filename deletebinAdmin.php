<?php
require("db_connection.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	$sql = "DELETE FROM books WHERE id = ?";        
    $q = $pdo->prepare($sql);

    $response = $q->execute(array($_GET['idBook']));  

    $sqlqw = "DELETE FROM bin WHERE book_id = ?";        
    $qqw = $pdo->prepare($sqlqw);

    $responseqw = $qqw->execute(array($_GET['idBook'])); 

    $sqlqa = "DELETE FROM comment WHERE book_id = ?";        
    $qqa = $pdo->prepare($sqlqa);

    $responseqa = $qqa->execute(array($_GET['idBook']));   
	
	header("Location: admin.php");  
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$sqlkl = "DELETE FROM comment WHERE id = ?";        
    $qkl = $pdo->prepare($sqlkl);

    $responsekl = $qkl->execute(array($_POST['idComment']));  

    header("Location: admin.php");  
}
?>