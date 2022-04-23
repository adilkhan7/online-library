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
    <link rel="stylesheet" type="text/css" href="css/account3.css">
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
      <li class="nav-item active">
    	<a class="nav-link" href="account.php">Кабинет</a>
      </li>
      <?php
      }
      ?>
      <?php
      if (!isset($_SESSION["client"])) {
      ?>
      <li class="nav-item active">
    	<a class="nav-link" href="account.php">Вход</a>
      </li>
      <?php
      }
      ?>
    </ul>
  </div>
</nav>

<?php 
if (isset($_SESSION["client"])) {
	echo "<div class='acc'>";
	echo "<div class='detail'><p>Здравствуйте, ".$_SESSION["client"]["fullname"]." !</p>";
	echo "<p class='nt'>Здесь хранится все ваши комментарии и желаемые книги</p>";
	echo "</div>";

	echo "<div class='bin'>";
	echo "<div class='word-cat'>";
	echo "<div></div>";
	echo "<div class='hr'><hr></div>";
	echo "<div><b>Корзина</b></div>";
	echo "<div class='hr'><hr></div>";
	echo "<div></div>";
	echo "</div>";

	$s = $pdo->query("SELECT * FROM bin WHERE client_id = ".$_SESSION["client"]["id"]."");
  	$r = $s->fetchAll();

	if ($r == null) {
  		echo "<p class='bad'>В вашем корзине 0 книг. Добавляйте книг которых вы хотите приобрести. </p>";
  	}

	echo "<div class='news-cat'>";
  	foreach ($r as $key) {
  		$st = $pdo->query("SELECT * FROM books WHERE id=".$key['book_id']."");
  		$ro = $st->fetch(PDO::FETCH_ASSOC);
  		echo "<div class='cats'>";
		echo "<form method='GET'>";
		echo "<input type='hidden' name='idBook' value='".$ro['id']."'>";
		echo "<img src=\"".$ro['picture']."\">";
		echo "<ul>";
		echo "<li><span>Автор: ".$ro['author']."</span></li>";
		echo "<li><span>Жанр: ".$ro['genre']."</span></li>";
		echo "<li><span>Цена: ".$ro['cost']."тг</span></li>";
		echo "</ul>";
		echo "<div class='inpq'>";
		echo "<input type=\"submit\" value='Заказать'></div>";
		echo "</form>";
		echo "<form method='GET' action='deletebin.php'>";
		echo "<input type='hidden' name='idBin' value='".$key['id']."'>";
		echo "<div class='inpqq'>";
		echo "<input type=\"submit\" value='Удалить'></div>";
		echo "</form>";
		echo "</div>";
  	}
	echo "</div>";
	echo "</div>";


	echo "<div class='bin'>";
	echo "<div class='word-cat'>";
	echo "<div></div>";
	echo "<div class='hr'><hr></div>";
	echo "<div><b>Бронированные</b></div>";
	echo "<div class='hr'><hr></div>";
	echo "<div></div>";
	echo "</div>";

	$swq = $pdo->query("SELECT * FROM bron WHERE client_id = ".$_SESSION["client"]["id"]."");
  	$rwq = $swq->fetchAll();

	if ($rwq == null) {
  		echo "<p class='bad'>У вас 0 бронированных книг. Бронируйте книги которые хотите прочитать в ближайщее время.</p>";
  	}

	echo "<div class='news-cat'>";
  	foreach ($rwq as $key) {
  		$stwq = $pdo->query("SELECT * FROM books WHERE id=".$key['book_id']."");
  		$rowq = $stwq->fetch(PDO::FETCH_ASSOC);
  		echo "<div class='cats'>";
		echo "<img src=\"".$rowq['picture']."\">";
		echo "<ul>";
		echo "<li><span>Автор: ".$rowq['author']."</span></li>";
		echo "<li><span>Жанр: ".$rowq['genre']."</span></li>";
		echo "<li><span>Цена: ".$rowq['cost']."тг</span></li>";
		echo "</ul>";
		
		echo "<form method='GET' action='deletebron.php'>";
		echo "<input type='hidden' name='idBin' value='".$key['id']."'>";
		echo "<div class='inpqq'>";
		echo "<input type=\"submit\" value='Отменить'></div>";
		echo "</form>";
		echo "</div>";
  	}
	echo "</div>";
	echo "</div>";




	echo "<div class='binqw'>";
	echo "<div class='word-cat'>";
	echo "<div></div>";
	echo "<div class='hr'><hr></div>";
	echo "<div><b>Ваши комментарии</b></div>";
	echo "<div class='hr'><hr></div>";
	echo "<div></div>";
	echo "</div>";

	$sasas = $pdo->query("SELECT * FROM comment WHERE client_id = ".$_SESSION["client"]["id"]."");
  	$rasas = $sasas->fetchAll();

  	if ($rasas == null) {
  		echo "<p class='bad'>Вы не написали ни одного отзыва. Оставляйте свое мнение о книге или об авторе. </p>";
  	}

  	echo "<div class='comms'>";
  	foreach ($rasas as $ke) {
  		$stio = $pdo->query("SELECT * FROM books WHERE id=".$ke['book_id']."");
  		$roio = $stio->fetch(PDO::FETCH_ASSOC);
  		echo "<div class='qwa'>";
  		echo "<div><p>Книга: ".$roio['name']."</p></div>";
        echo "<div><p>".$ke['texts']."</p></div>";
        echo "<div><p>".$ke['dates']."</p></div>";
        echo "<div>";
        echo "<form method='GET' action='book.php'>";
		echo "<input type='hidden' name='idBook' value='".$ke['book_id']."'>";
		echo "<input class='btnw' type=\"submit\" value='Показать'>";
		echo "</form>";
		echo "</div>";

		echo "<div>";
        echo "<form method='POST' action='deletebin.php'>";
		echo "<input type='hidden' name='idComment' value='".$ke['id']."'>";
		echo "<input class='btnf' type=\"submit\" value='Удалить'>";
		echo "</form>";
		echo "</div>";

        echo "</div>";

  	}
  	echo "</div>";

	echo "</div>";


	echo "<div class='exit'><a href='exit.php'><button>Выйти с аккаунта</button></a></div>";
	echo "</div>";
}

if (!isset($_SESSION["client"])) {
?>
<div class="regautho">
	<div></div>
	<div class="auth">
		<div class="und">
		<div class="auth-w">
			<div class="hr"><hr></div>
			<div><p>Авторизация</p></div>
			<div class="hr"><hr></div>
		</div>

		<?php
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST["email"]) && isset($_POST["password"])) {
						$stmt = $pdo->query("SELECT * FROM client WHERE email = '".$_POST["email"]."' AND password = '".$_POST["password"]."'");
  						$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
  						if ($row != null) {
							$_SESSION["client"] = $row;
							header("Location: account.php");
  						} else {
  							echo "<p class='ps' style='color: firebrick;'><b>Аккаунт с таким паролем и электронным адресом нету в базе! </b></p>";
  						}		
					}
				}
		?>

		<form method="POST">
			<span>Электронный адрес: </span>
			<input required class="inp" type="email" name="email"><br><br>
			<span>Пароль: </span>
			<input required class="inp"  type="password" name="password"><br><br>
			<input class="btnn" type="submit" name="login" value="Авторизация">
		</form>
	    </div>
	</div>
	<div class="reg">
		<div class="und">
		<div class="auth-w">
			<div class="hr"><hr></div>
			<div><p>Регистрация</p></div>
			<div class="hr"><hr></div>
		</div>

		<?php
				if ($_SERVER['REQUEST_METHOD'] == "POST") { 
					if (isset($_POST["fullname"]) && isset($_POST["age"]) && isset($_POST["emailr"]) && isset($_POST["password1"]) && isset($_POST["password2"])) {
						if ($_POST["password1"] != $_POST["password2"]) {
							echo "<p class='ps' style='color: firebrick;'><b>Пароли не совпадают! </b></p>";
						} else {
							$sql = "INSERT INTO client (fullname, age, email, password) VALUES (:fullname, :age, :email, :password);";
							$qe = $pdo->prepare($sql);
							$qe->execute(array(
								':fullname' => $_POST["fullname"],
								':age' => $_POST["age"],
								':email' => $_POST["emailr"],
								':password' => $_POST["password1"]
							));
							echo "<p class='ps' style='color: green;'><b>Аккаунт успешно регистрировано! Можете спокойно авторизоваться</b></p>";
						}
					}
				}
		?>
		
		<form method="POST">
			<span>Имя и фамилия: </span>
			<input required class="inp" type="text" name="fullname"><br><br>
			<span>Возраст: </span>
			<input required class="ip" type="number" name="age" min="1" max="120"><br><br>
			<span>Электронный адрес: </span>
			<input required class="inp" type="email" name="emailr"><br><br>
			<span>Пароль: </span>
			<input required class="inp"  type="password" name="password1"><br><br>
			<span>Подтвердите пароль: </span>
			<input required class="inp"  type="password" name="password2"><br><br>
			<input class="btnn" type="submit" name="registration" value="Регистрация">
		</form>
	    </div>
	</div>
	<div></div>
</div>

<?php
}
?>

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