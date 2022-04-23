<?php
require("db_connection.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	$stmtq = $pdo->query("SELECT * FROM bron WHERE client_id = ".$_SESSION["client"]["id"]." AND book_id = ".$_GET["idBook"]."");
  	$row = $stmtq->fetch(PDO::FETCH_ASSOC);
		
  	if ($row == null) {
		$sql = "INSERT INTO bron (client_id, book_id) VALUES (:client_id, :book_id);";
		$qe = $pdo->prepare($sql);
		$qe->execute(array(
			':client_id' => $_SESSION["client"]["id"],
			':book_id' => $_GET["idBook"]
		));
		$sql0 = "UPDATE books SET count = count-1 WHERE id = ".$_GET["idBook"]."" ;
		$qe0 = $pdo->prepare($sql0);
		$qe0->execute();
  	} 
	
	header("Location: account.php");
}
?>
