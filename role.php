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
    <link rel="stylesheet" type="text/css" href="css/role.css">
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
      <li class="nav-item active">
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

<div class="role">
  <div class="word-cat">
    <div></div>
    <div class="hr"><hr></div>
    <div class=""><b>Влияние книги на человека</b></div>
    <div class="hr"><hr></div>
    <div></div>
  </div>

  <div class="wordd">
    <p>Литература, со временем, теряет свою популярность. Сейчас становится всё труднее встретить человека, который читает книги, а люди, полностью живущие литературой встречаются крайне редко. И сейчас, как никогда, актуален вопрос: "А какое влияние оказывают книги на человека?". Над этим вопросом можно размышлять очень долго.<br>

Что такое книга? Книга - мысли автора, которые сохранены на бумаге. Эта фраза может заставить задуматься о поисках собственных мыслей и записывании их на лист бумаги.<br>

Конечно же, писать книги дано не каждому, некоторые люди обладают редким даром писателя, только их рассказы выделяются на фоне остальных. Это связано с тем, не могут правильно сформулировать свою мысль, чтобы преподнести её остальным.<br>

Размышление - весьма важный процесс, который может быть очень долгим и требует усидчивости и необходимой концентрации. Если к мыслительному процессу подойти с правильной стороны, то он может быть не легче физического труда, а даже сложнее. Ошибки в сфере логики, анализа и неправильное мировоззрение свидетельствует о том, что многие люди просто не приучены грамотно мыслить, что связано с отсутствием литературы в их жизни.<br>

Чтение книг, не обязательно художественной литературы, позволяет приобрести и развить в себе культуру мыслительного процесса. Книга может даже самой примитивной - короткий рассказ, в котором участвует всего пара героев. Даже такое маленькое произведение считается интеллектуальным трудом и может нести определенный смысл. После прочтения книги, перед читателем возникает общая картина. Далее человек обдумывает её и делает какие-то выводы, зачастую схожие с теми, которые хотел передать писатель, однако же, могут и различаться.<br>

Книга - отличный тренажер для ума, она позволяет усваивать мысли другого человека(автора), а также улучшить концентрацию и внимание на собственных. Бывает такое, что книга создает какие-либо ассоциации с другими мыслями, не относящимися к сюжету. Эти ассоциации хорошо способствуют развитию воображения и фантазии, а также помогают находить иные пути решения проблем, которые были недоступны ранее.<br>

Иногда случается так, что книга затягивает настолько, что читатель с особым вниманием следит за мыслями героев и происходящими событиями в рассказе. Человек начинает с особой концентрацией размышлять над темами, которые предложены в сюжете. Это является ещё одной тренировкой сознания. Так как, в момент обдумывания сюжета, человек учится самостоятельно размышлять над некоторыми глубокими вопросами.<br>

В общем - книга учит правильно размышлять и улучшает фантазию. Улучшает духовное и культурное развитие человека.
</p>
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