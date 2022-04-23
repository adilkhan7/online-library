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
    <link rel="stylesheet" type="text/css" href="css/main2.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
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
      session_start();
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
		<div class=""><b>НОВИНКИ</b></div>
		<div class="hr"><hr></div>
		<div></div>
	</div>
	<div class="news-cat">
		<?php
		if (isset($_SESSION["sort"])) {
            unset($_SESSION["sort"]);
        }
        if (isset($_SESSION["filter"])) {
            unset($_SESSION["filter"]);
        }

        if (isset($_SESSION["admin"])) {
            unset($_SESSION["admin"]);
        }

		require("db_connection.php");
		$stmt = $pdo->query("SELECT * FROM books WHERE status = 'Новинка'");
		$row = $stmt->fetchAll();

		$i = 0;
		foreach ($row as $r) {
			$i++;
			if ($i==6) {
				break;
			}
			echo "<div class='cats'>";
			echo "<form method='GET' action='book.php'>";
			echo "<input type='hidden' name='idBook' value='".$r['id']."'>";
			echo "<img src=\"".$r['picture']."\">";
			echo "<ul>";
			echo "<li><span>Автор: ".$r['author']."</span></li>";
			echo "<li><span>Жанр: ".$r['genre']."</span></li>";
			echo "<li><span>Цена: ".$r['cost']."тг</span></li>";
			echo "</ul>";
			echo "<div class='inp'>";
			echo "<input type=\"submit\" value='Показать'></div>";
			echo "</form>";
			echo "</div>";
		}
		?>
	</div>
</div>

<div class="news">
	<div class="word-cat">
		<div></div>
		<div class="hr"><hr></div>
		<div class=""><b>БЕСТСЕЛЛЕРЫ</b></div>
		<div class="hr"><hr></div>
		<div></div>
	</div>
	<div class="news-cat">
		<?php
		require("db_connection.php");
		$stmt = $pdo->query("SELECT * FROM books WHERE status = 'Бестселлер'");
		$row = $stmt->fetchAll();

		$i = 0;
		foreach ($row as $r) {
			$i++;
			if ($i==6) {
				break;
			}
			echo "<div class='cats'>";
			echo "<form method='GET' action='book.php'>";
			echo "<input type='hidden' name='idBook' value='".$r['id']."'>";
			echo "<img src=\"".$r['picture']."\">";
			echo "<ul>";
			echo "<li><span>Автор: ".$r['author']."</span></li>";
			echo "<li><span>Жанр: ".$r['genre']."</span></li>";
			echo "<li><span>Цена: ".$r['cost']."тг</span></li>";
			echo "</ul>";
			echo "<div class='inp'>";
			echo "<input type=\"submit\" value='Показать'></div>";
			echo "</form>";
			echo "</div>";
		}
		?>
	</div>
</div>

<div class="news">
	<div class="word-cat">
		<div></div>
		<div class="hr"><hr></div>
		<div class=""><b>ЖУРНАЛЫ И ГАЗЕТЫ</b></div>
		<div class="hr"><hr></div>
		<div></div>
	</div>
	<div class="news-cat">
		<?php
		require("db_connection.php");
		$stmt = $pdo->query("SELECT * FROM journals");
		$row = $stmt->fetchAll();

		$i = 0;
		foreach ($row as $r) {
			$i++;
			if ($i==6) {
				break;
			}
			echo "<div class='cats'>";
			echo "<form method='GET' action='journal.php'>";
			echo "<input type='hidden' name='idBook' value='".$r['id']."'>";
			echo "<img src=\"".$r['url']."\">";
			echo "<ul>";
			echo "<li><span>Название: ".$r['title']."</span></li>";
			echo "<li><span>Издатель: ".$r['publisher']."</span></li>";
			echo "<li><span>Дата публикации: ".$r['date']."</span></li>";
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