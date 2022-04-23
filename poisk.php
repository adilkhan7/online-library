<?php
require("db_connection.php");
session_start();

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
    <link rel="stylesheet" type="text/css" href="css/poisk2.css">
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

<div class="news">
  <div class="word-cat">
    <div></div>
    <div class="hr"><hr></div>
    <div class=""><b>Поиск</b></div>
    <div class="hr"><hr></div>
    <div></div>
  </div>

  <?php
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
      $zopros = $_GET["poisk"];
      $array = array();
      $iop = 0;
      $as = $pdo->query("SELECT * FROM books");
      $ad = $as->fetchAll();
      foreach ($ad as $key) {
        if (strlen($_GET["poisk"]) <= strlen($key["name"])) {
          for ($i=0; $i < strlen($_GET["poisk"]); $i++) {   
            if (mb_strtoupper($_GET["poisk"][$i], "UTF-8") != mb_strtoupper($key["name"][$i], "UTF-8")) {
              $iop++;
            }
          }
          if ($iop == 0) {
            array_push($array, $key["id"]);
          } else {
            $iop = 0;
          }
        }
      }

      foreach ($ad as $key) {
        if (strlen($_GET["poisk"]) <= strlen($key["author"])) {
          for ($i=0; $i < strlen($_GET["poisk"]); $i++) {   
            if (mb_strtoupper($_GET["poisk"][$i], "UTF-8") != mb_strtoupper($key["author"][$i], "UTF-8")) {
              $iop++;
            }
          }
          $yu = 0;
          if ($iop == 0) {
            foreach ($array as $keycv) {
              if ($keycv == $key["id"]) {
                $yu++;
              }
            }
            if ($yu == 0) {
              array_push($array, $key["id"]);
            }
            
          } else {
            $iop = 0;
          }
        }
      }
    }

    $qwee = 0;
    foreach ($array as $key) {
      $qwee++;
    }
  ?>

  <div class="rez">
    <p>Результаты поиска по " <?php echo $zopros  ?> " [ Найдено <?php if ($qwee == 0){ echo $qwee." книг ";} elseif ($qwee == 1) {echo $qwee." книга ";} elseif ($qwee >= 2) {echo $qwee." книги ";} ?>] </p>
  </div>

  <div class="news-cat">
    <?php
    foreach ($array as $key) {
      $qaz = $pdo->query("SELECT * FROM books WHERE id = ".$key."");
      $roqw = $qaz->fetch(PDO::FETCH_ASSOC);
      echo "<div class='cats'>";
      echo "<form method='GET' action='book.php'>";
      echo "<input type='hidden' name='idBook' value='".$roqw['id']."'>";
      echo "<img src=\"".$roqw['picture']."\">";
      echo "<ul>";
      echo "<li><span>Автор: ".$roqw['author']."</span></li>";
      echo "<li><span>Жанр: ".$roqw['genre']."</span></li>";
      echo "<li><span>Цена: ".$roqw['cost']."тг</span></li>";
      echo "</ul>";
      echo "<div class='inp'>";
      echo "<input type=\"submit\" value='Показать'></div>";
      echo "</form>";
      echo "</div>";
    }
    ?>
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