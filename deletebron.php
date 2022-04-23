<?php
require("db_connection.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	$stwq = $pdo->query("SELECT * FROM bron WHERE id=".$_GET['idBin']."");
  	$rowq = $stwq->fetchAll();

  	foreach ($rowq as $key) {
  		$sql0 = "UPDATE books SET count = count + 1 WHERE id = ".$key['book_id']."" ;
		$qe0 = $pdo->prepare($sql0);
		$qe0->execute();
  	}

	
	$sql = "DELETE FROM bron WHERE id = ?";        
    $q = $pdo->prepare($sql);

    $response = $q->execute(array($_GET['idBin']));  

    
	
	header("Location: account.php");  

    
}
