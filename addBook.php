<?php
require("db_connection.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$sql = "INSERT INTO books (name, author, picture, cost, status, genre, description, date, count) VALUES (:name, :author, :picture, :cost, :status, :genre, :description, :date, :count);";
		$qe = $pdo->prepare($sql);
		$qe->execute(array(
			':name' => $_POST["name"],
			':author' => $_POST["author"],
			':picture' => $_POST["picture"],
			':cost' => $_POST["cost"],
			':status' => $_POST["status"],
			':genre' => $_POST["ganre"],
			':description' => $_POST["story"],
			':date' => $_POST["date"],
			':count' => $_POST["count"]
		));
  	
	header("Location: admin.php");
	
}
?>