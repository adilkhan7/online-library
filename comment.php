<?php
require("db_connection.php");
session_start();
      if ($_SERVER['REQUEST_METHOD'] == "GET") {
          $date_today = date("Y-m-d");
          $sqlqw = "INSERT INTO comment (client_id, book_id, texts, dates) VALUES (:client_id, :book_id, :texts, :dates);";
          $qeqw = $pdo->prepare($sqlqw);
          $qeqw->execute(array(
            ':client_id' => $_SESSION["client"]["id"],
            ':book_id' => $_GET["idBookq"],
            ':texts' => $_GET["comment"],
            ':dates' => $date_today
          ));
          header("Location: account.php");
        
      }
?>