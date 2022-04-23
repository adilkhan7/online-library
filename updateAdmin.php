<?php
require("db_connection.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $arrayName = array([$_POST["name"], $_POST["author"], $_POST["cost"], $_POST["status"], $_POST["ganre"], $_POST["story"], $_POST["count"], $_POST["idBookq"]]);
    print_r($arrayName);
	$sql = "UPDATE books SET name=?, author=?, cost=?, status=?, genre=?, description=?, count=? WHERE id=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$_POST["name"], $_POST["author"], $_POST["cost"], $_POST["status"], $_POST["ganre"], $_POST["story"], $_POST["count"], $_POST["idBookq"]]);
	
    header("Location: admin.php");
}
?>