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
    <link rel="stylesheet" type="text/css" href="css/addAdmin.css">
</head>
<body>

<div class="regautho">
	<div></div>
	<div class="auth">
		<div class="und">
		<div class="auth-w">
			<div class="hr"><hr></div>
			<div><p>Добавление книг в базу</p></div>
			<div class="hr"><hr></div>
		</div>

		<form method="POST" id="confirmationForm" name="confirmationForm" action="addBook.php">
			<span>Название: </span>
			<input required class="inp" type="text" name="name"><br><br>
			<span>Автор: </span>
			<input required class="inp"  type="text" name="author"><br><br>
			<span>Обложка: </span>
			<input required class="inp"  type="text" name="picture" placeholder="Url address..."><br><br>
			<span>Цена: </span>
			<input required class="inp1"  type="number" min="1" name="cost"><br><br>
			<span>Статус: </span>
			<input required class="inp"  type="text" name="status"><br><br>
			<span>Жанр: </span>
			<input required class="inp"  type="text" name="ganre"><br><br>
			<span>Дата выхода: </span>
			<input required class="inp"  type="text" name="date" placeholder="yyyy-mm-dd"><br><br>
			<span>Количество: </span>
			<input required class="inp"  type="text" name="count"><br><br>
			<span>Краткая история: </span><br>
			<textarea required id="confirmationText" name="story" form="confirmationForm" placeholder="О чем книга..."></textarea><br><br>

			<input class="btnn" type="submit" name="login" value="Добавить">
		</form>
	    </div>
	</div>
	<div></div>
</div>



</body>
</html>