<?php
require("db_connection.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Библиотека</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/bookAdmin1.css">
</head>
<body>

<?php 
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $stmt = $pdo->query("SELECT * FROM books WHERE id = ".$_GET["idBook"]." ");
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
?>

<div class="book">
  <div class="book-s">
    <div></div>
    <div class="img">
      <img src="<?= $row['picture'] ?>">
    </div>
    <div class="info">
      <form method="POST" action="updateAdmin.php" id="confirmationForm" name="confirmationForm">
      <div> 
        <ul>
          <li><span>Название: </span><input class="change" type="text" name="name" value="<?= $row['name'] ?>"></li>
          <li><span>Автор: </span><input class="change"  type="text" name="author" value="<?= $row['author'] ?>"></li>
          <li><span>Цена: </span><input class="change1"  type="number" min="1" name="cost" value="<?= $row['cost'] ?>"><span> тг</span></li>
          <li><span>Статус: </span><input class="change" t type="text" name="status" value="<?= $row['status'] ?>"></li>
          <li><span>Жанр: </span><input class="change"  type="text" name="ganre" value="<?= $row['genre'] ?>"></li>
          <li><span>Количество: </span><input class="change"  type="text" name="count" value="<?= $row['count'] ?>"></li>
        </ul>
      </div><br>

      <div class="story">
        <p>O чем книга</p>
        <input type="hidden" name="idBookq" value="<?= $row['id'] ?>">
        <textarea id="confirmationText" name="story" form="confirmationForm"><?= $row['description'] ?></textarea>
      </div>

      <input class="izmen" type="submit" value="Изменить">
      </form>
    </div>


    <div class="comment">
      <div class="word-cat">
        <div></div>
        <div class="hr"><hr></div>
        <div class=""><b>Отзывы</b></div>
        <div class="hr"><hr></div>
        <div></div>
      </div>

      <div class="commente">
      <?php
        $stmw = $pdo->query("SELECT * FROM comment WHERE book_id = ".$_GET["idBook"]." ");
        $ras = $stmw->fetchAll();
        foreach ($ras as $ke) {
          echo "<div class='qwa'>";
          echo $ke['texts']."<br>";
          echo "<span class='pe'>".$ke['dates']."</span>";
          $stqw = $pdo->query("SELECT * FROM client WHERE id = ".$ke['client_id']." ");
          $rqs = $stqw->fetch(PDO::FETCH_ASSOC);
          
          echo "<span class='pw'>".$rqs['fullname']."</span>";
          
          

          echo "</div>";

          echo "<form method='POST' action='deletebinAdmin.php'>";
          echo "<input type='hidden' name='idComment' value='".$ke['id']."'>";
          echo "<input class='assad' type=\"submit\" value='Удалить'>";
          echo "</form>";

          
        }
      ?>
      </div>
    </div>
    <div></div>
  </div>
</div>

<div class="white"></div>

</body>
</html>