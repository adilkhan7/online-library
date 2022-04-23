<?php
require("db_connection.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	$stmtq = $pdo->query("SELECT * FROM bin WHERE client_id = ".$_SESSION["client"]["id"]." AND book_id = ".$_GET["idBook"]."");
  	$row = $stmtq->fetch(PDO::FETCH_ASSOC);
		
  	if ($row == null) {
		$sql = "INSERT INTO bin (client_id, book_id) VALUES (:client_id, :book_id);";
		$qe = $pdo->prepare($sql);
		$qe->execute(array(
			':client_id' => $_SESSION["client"]["id"],
			':book_id' => $_GET["idBook"]
		));
  	} 
	
	header("Location: account.php");
}
?>