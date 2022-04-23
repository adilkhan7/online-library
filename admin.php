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
    <link rel="stylesheet" type="text/css" href="css/admin1.css">
</head>
<body>

<?php 
if (isset($_SESSION["admin"])) {
	echo "<div class='acc'>";
	echo "<div class='detail'><p>Здравствуйте, ".$_SESSION["admin"]["name"]." !</p>";
	echo "<p class='nt'>Здесь показан все книги в базе и комментарии пользователей. Вы можете сделать все что угодно удалить, изменить, добавить и т.д.</p>";
	echo "</div>";

	echo "<div class='bin'>";
	echo "<div class='word-cat'>";
	echo "<div></div>";
	echo "<div class='hr'><hr></div>";
	echo "<div><b>Все книги</b></div>";
	echo "<div class='hr'><hr></div>";
	echo "<div></div>";
	echo "</div>";

	$s = $pdo->query("SELECT * FROM books;");
  	$r = $s->fetchAll();

  	if ($r == null) {
  		echo "<p class='bad'>В базе нет ни одной книги. Вы можете добавить книги вручную в меню. </p>";
  	}

	echo "<div class='news-cat'>";
  	foreach ($r as $key) {
  		echo "<div class='cats'>";
		echo "<form method='GET' action='bookAdmin.php'>";
		echo "<input type='hidden' name='idBook' value='".$key['id']."'>";
		echo "<img src=\"".$key['picture']."\">";
		echo "<ul>";
		echo "<li><span>Автор: ".$key['author']."</span></li>";
		echo "<li><span>Жанр: ".$key['genre']."</span></li>";
		echo "<li><span>Цена: ".$key['cost']."тг</span></li>";
		echo "</ul>";
		echo "<div class='inpq'>";
		echo "<input type=\"submit\" value='Показать'></div>";
		echo "</form>";
		echo "<form method='GET' action='deletebinAdmin.php'>";
		echo "<input type='hidden' name='idBook' value='".$key['id']."'>";
		echo "<div class='inpqq'>";
		echo "<input type=\"submit\" value='Удалить'></div>";
		echo "</form>";
		echo "</div>";
  	}
	echo "</div>";
	echo "</div>";

	echo "<div class='binqw'>";
	echo "<div class='word-cat'>";
	echo "<div></div>";
	echo "<div class='hr'><hr></div>";
	echo "<div><b>Все комментарии</b></div>";
	echo "<div class='hr'><hr></div>";
	echo "<div></div>";
	echo "</div>";

	$sasas = $pdo->query("SELECT * FROM comment;");
  	$rasas = $sasas->fetchAll();

  	if ($rasas == null) {
  		echo "<p class='bad'>В базе нет ни одной комментарии. Пользователи еще не оставили отзывы о книге. </p>";
  	}

  	echo "<div class='comms'>";
  	foreach ($rasas as $ke) {
  		$stio = $pdo->query("SELECT * FROM books WHERE id=".$ke['book_id']."");
  		$roio = $stio->fetch(PDO::FETCH_ASSOC);

  		$saz = $pdo->query("SELECT * FROM client WHERE id=".$ke['client_id']."");
  		$raz = $saz->fetch(PDO::FETCH_ASSOC);
  		echo "<div class='qwa'>";
  		echo "<div><p>Книга: ".$roio['name']."</p></div>";
        echo "<div><p>".$ke['texts']."</p></div>";
        echo "<div><p>".$ke['dates']."</p></div>";
        echo "<div><p>".$raz['fullname']."</p></div>";
		echo "<div>";
        echo "<form method='POST' action='deletebinAdmin.php'>";
		echo "<input type='hidden' name='idComment' value='".$ke['id']."'>";
		echo "<input class='btnf' type=\"submit\" value='Удалить'>";
		echo "</form>";
		echo "</div>";

        echo "</div>";

  	}
  	echo "</div>";

	echo "</div>";

	echo "<a class='addss' href='addAdmin.php'><button>Добавить книгу</button></a>";
	echo "<div class='exit'><a href='exitAdmin.php'><button>Выйти со страницы админа</button></a></div>";
	echo "</div>";

	
}

if (!isset($_SESSION["admin"])) {
?>
<div class="regautho">
	<div></div>
	<div class="auth">
		<div class="und">
		<div class="auth-w">
			<div class="hr"><hr></div>
			<div><p>Авторизация ( Админ ) </p></div>
			<div class="hr"><hr></div>
		</div>

		<?php
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST["email"]) && isset($_POST["password"])) {
						$stmt = $pdo->query("SELECT * FROM admin WHERE email = '".$_POST["email"]."' AND password = '".$_POST["password"]."'");
  						$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
  						if ($row != null) {
							$_SESSION["admin"] = $row;
							header("Location: admin.php");
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
	<div></div>
</div>

<?php
}
?>

</body>
</html>