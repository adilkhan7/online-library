<?php
require("db_connection.php");
session_start();

if (isset($_SESSION["sort"])) {
  unset($_SESSION["sort"]);
}
if (isset($_SESSION["filter"])) {
            unset($_SESSION["filter"]);
        }

        if (isset($_SESSION["admin"])) {
            unset($_SESSION["admin"]);
        }
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
    <link rel="stylesheet" type="text/css" href="css/book4.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="main.php">Главная <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ganre.php">Жанры книг</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="role.php">Роль чтение</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="catalog.php">Книги</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="journal.php">Журналы и газеты</a>
      </li>
      <?php
      if (isset($_SESSION["client"])) {
      ?>
      <li class="nav-item">
    	<a class="nav-link" href="account.php">Кабинет</a>
      </li>
      <?php
      }
      ?>
      <?php
      if (!isset($_SESSION["client"])) {
      ?>
      <li class="nav-item">
    	<a class="nav-link" href="account.php">Вход</a>
      </li>
      <?php
      }
      ?>
    </ul>
  </div>
</nav>

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
      <?php
      if (isset($_SESSION["client"])) {
      ?>
      <form action="add.php" method="GET">
        <input type="hidden" name="idBook" value="<?= $row['id'] ?>">
        <input class="but" type="submit" value="В желаемое">
      </form>
      <?php
      }
      ?>
    </div>
    <div class="info">
      <div>
        <ul>
          <li><span>Название: <?= $row['name'] ?></span></li>
          <li><span>Автор: <?= $row['author'] ?></span></li>
          <li><span>Цена: <?= $row['cost'] ?> тг</span></li>
          <li><span>Статус: <?= $row['status'] ?></span></li>
          <li><span>Жанр: <?= $row['genre'] ?></span></li>
          <li><span>Количество: <?= $row['count'] ?></span></li>
          <?php
          if (isset($_SESSION["client"])) {
            if ($row['count'] != 0) {
        ?>
        <form action="bron.php" method="GET">
          <input type="hidden" name="idBook" value="<?= $row['id'] ?>">
          <input class="but" type="submit" value="Бронировать">
        </form>
        <?php
        } else {
        ?>
        <p style="margin-top: 4vh; color: red">Невозможно бронировать книгу, так как в данный момент книга отсутствует в библиотеке</p>
        <?php
        }}
        ?>
        </ul>
        
      </div><br>

      <div class="story">
        <p>O чем книга</p>
        <p><?= $row['description'] ?></p>
      </div>
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
          if (isset($_SESSION["client"])) {
            if ($_SESSION["client"]["id"] == $ke['client_id']) {
              echo "<span class='pw'>Вы</span>";
            } else {
              echo "<span class='pw'>".$rqs['fullname']."</span>";
            }
          }
          else {
            echo "<span class='pw'>".$rqs['fullname']."</span>";
          }
          echo "</div>";
        }
      ?>
      </div>

      <?php
      if (isset($_SESSION["client"])) {
      ?>
      <div class="otziv">
        <form action="comment.php" id="confirmationForm" name="confirmationForm" method="GET">
          <input type="hidden" name="idBookq" value="<?= $row['id'] ?>">
          <textarea id="confirmationText" name="comment" form="confirmationForm" placeholder="Вы можете оставить отзыв о книге ... " required></textarea><br>
          <input class="btt" type="submit" value="Отправить">
        </form>
      </div>
      <?php
      }
      ?>
    </div>
    <div></div>
  </div>
</div>


<div class="footer">
  <div class="word-foot">
    <div></div>
    <div class="hrf"><hr></div>
    <div class=""><b>СВЯЖИТЕСЬ С НАМИ</b></div>
    <div class="hrf"><hr></div>
    <div></div>
  </div>
  <div class="footer-in">
    <div class="footer-ini">
      <div>
        <img src="icons/icons8-телефон-100.png">
      </div>
      <div>
        <p> +7 (4872) 77-02-07 </p>
      </div>
    </div>
    <div class="email">
      <p>info@oktavaklaster.ru</p>
    </div>
    <div class="media">
      <div></div>
      <div><a href="https://www.instagram.com/?hl=ru"><img src="icons/icons8-instagram-208.png"></a></div>
      <div><a href="https://www.facebook.com/"><img src="icons/icons8-facebook-208.png"></a></div>
      <div><a href="https://vk.com/feed"><img src="icons/icons8-vk-в-круге-100.png"></a></div>
      
    </div>
  </div>
</div>


</body>
</html>