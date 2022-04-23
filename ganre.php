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
    <link rel="stylesheet" type="text/css" href="css/ganre2.css">
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
      <li class="nav-item  active">
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

<div class="bots">
  <div class="r4"><p class="wr">Художественные произведения делятся на жанровую литературу, мейнстрим и интеллектуальную прозу.</p>

<div class="r1">
      <div></div>
      <div class="accordion" id="accordionExample">
                <div class="card c1">
                    <div class="card-header sett" id="headingOne">
                      <div>
                        <button class="btn btn-link link1" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           Жанровая литература
                           </button>
                      </div>
                        <div></div>
                
             </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              
                <div class="card-body cardd">
                  В жанровой литературе первую скрипку играет сюжет, при этом он вписывается в определенные, заранее известные рамки.<br>

                  Это вовсе не значит, что все жанровые романы должны быть предсказуемыми. Мастерство писателя заключается именно в том, чтобы в заданных условиях создать уникальный мир, незабываемых героев и интересный способ добраться из пункта «А» (завязка) в пункт «Б» (развязка).<br>

                  Как правило, жанровое произведение кончается на позитивной ноте, автор не углубляется в психологию и прочие высокие материи и старается просто развлечь читателей.<br><br>

                  Основные сюжетные схемы в жанровой литературе<br>
* Детектив: преступление — расследование — изобличение преступника.<br>

* Любовный роман: герои встречаются — влюбляются — сражаются за любовь — соединяют сердца.<br>

* Триллер: герой жил своей обычной жизнью — возникает угроза — герой пытается спастись — герой избавляется от опасности.<br>

* Приключения: герой ставит перед собой цель и, преодолев множество препятствий, добивается желаемого.<br><br>

Когда мы говорим о фантастике, фэнтези, историческом или современном романе, речь идет не столько о сюжете, сколько о декорациях, поэтому при определении жанра используются два или три термина, которые позволяют ответить на вопросы: «Что происходит в романе?» и «Где происходит?». Если речь идет о детской литературе, то делается соответствующая пометка.<br>

Примеры: «современный любовный роман», «фантастический боевик» (боевик — это приключения), «исторический детектив», «детская приключенческая повесть», «сказка для младшего школьного возраста».<br>

Жанровая проза, как правило, публикуется сериями — либо авторскими, либо общими.<br>
                </div>
              </div>
          </div>
        </div>
        <div></div>
    </div>

    <div class="r1">
      <div></div>
      <div class="accordion" id="accordionExamplee">
                <div class="card c1">
                    <div class="card-header sett" id="headingTwo">
                      <div></div>
                        <div><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="float: right;">
                        Мейнстрим
                        </button></div>
             </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExamplee">
                <div class="card-body cardd">
                  В мейнстриме (от англ. mainstream — основной поток) читатели ждут от автора неожиданных решений. Для этого типа книг самое главное — нравственное развитие героев, философия и идеология. Требования к автору мейнстрима гораздо выше, чем к писателям, работающим с жанровой прозой: он должен быть не только отличным рассказчиком, но и хорошим психологом и серьезным мыслителем.<br>

Еще один важный признак мейнстрима — такие книги пишутся на стыке жанров. Например, невозможно однозначно сказать, что «Унесенные ветром» — это только любовный роман или только историческая драма.<br>

Кстати, сама по себе драма, то есть рассказ о трагическом опыте героев, — это тоже признак мейнстрима.<br>

Как правило, романы этого типа выпускаются вне серий. Это связано с тем, что серьезные произведения пишутся долго и сформировать из них серию довольно проблематично. Более того, авторы мейнстрима настолько отличаются друг от друга, что их книги сложно сгруппировать по какому-либо признаку, кроме «хорошая книга».<br>

При указании жанра в мейнстрим-романах обычно делается упор не столько на сюжет, сколько на некие отличительные признаки книги: историческая драма, роман в письмах, фантастическая сага и пр.<br>
                </div>
              </div>
          </div>
        </div>
        <div></div>
    </div>

<div class="r1">
      <div></div>
      <div class="accordion" id="accordionExampleee">
                <div class="card c1">
                    <div class="card-header sett" id="headingThree">
                      <div>
                        <button class="btn btn-link link1" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                           Интеллектуальная проза
                           </button>
                      </div>
                        <div></div>
                
             </div>

            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExampleee">
              
                <div class="card-body cardd">
                 В отличие от мейнстрима, который должен апеллировать к широкой читательской аудитории, интеллектуальная проза ориентирована на узкий круг ценителей и претендует на элитарность. Авторы не ставят себе целью коммерческий успех: их прежде всего интересуют искусство ради искусства и возможность поделиться с миром чем-то наболевшим.<br>

В подавляющем большинстве случаев интеллектуальная проза имеет мрачный настрой и выпускается вне серий.<br>
                </div>
              </div>
          </div>
        </div>
        <div></div>
    </div>

    <div class="rty">
      <p>Основные жанры художественной литературы:</p>
      <ul>
        <li><span>Авангардная литература. Характеризуется нарушением канонов и языковыми и сюжетными экспериментами. Как правило, авангард выходит очень маленькими тиражами. Тесно переплетается с интеллектуальной прозой.</span></li>
        <li><span>Боевик. Ориентирован преимущественно на мужскую аудиторию. Основа сюжета — драки, погони, спасение красоток и т.п.</span></li>
        <li><span>Детектив. Основная сюжетная линия — раскрытие преступления.</span></li>
        <li><span>Исторический роман. Время действия — прошлое. Сюжет, как правило, привязан к значимым историческим событиям.</span></li>
        <li><span>Любовный роман. Герои обретают любовь.</span></li>
        <li><span>Мистика. Основа сюжета — сверхъестественные события.</span></li>
        <li><span>Приключения. Герои ввязываются в авантюру и/или отправляются в рискованное путешествие.</span></li>
        <li><span>Триллер/ужасы. Героям грозит смертельная опасность, от которой они пытаются избавиться.</span></li>
        <li><span>Фантастика. Сюжет закручивается в гипотетическом будущем или в параллельном мире. Одна из разновидностей фантастики — альтернативная история.</span></li>
        <li><span>Фэнтези/сказки. Основными признаками жанра являются сказочные миры, волшебство, невиданные существа, говорящие животные и пр. Часто основывается на фольклоре.</span></li>
      </ul>
    </div>


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