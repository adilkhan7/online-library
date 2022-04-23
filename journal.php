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
    <link rel="stylesheet" type="text/css" href="css/catalog6.css">
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
      <li class="nav-item active">
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
    <div class=""><b>Все журналы и газеты</b></div>
    <div class="hr"><hr></div>
    <div></div>
  </div>


  <div class="sortirovka">
    <div></div>
    <div class="basic">    
    <form method="POST">
      <span>Сортировка:</span>
      <select name="rank">
        <option value="base">Вы можете сортировать журналы и газеты</option>
        <option value="title">по названию</option>
        <option value="publisher">по издателям</option>
        <option value="date">по датам выхода</option>
      </select>
      <input type="submit" name="direction" value="Сортировать">
    </form>
    </div>
  </div>

  <div class="twotype">
  <div class="filter">
    <div class="mainn">
      <form method="POST">
        <p>Фильтрация:</p>

        <?php
          $stmtop = $pdo->query("SELECT * FROM journals ;");
          $rowop = $stmtop->fetchAll();

          $ii= 0;
          $authors = array();
          foreach ($rowop as $key) {
            foreach ($authors as $keyw) {
              if ($key["author"] == $keyw) {
                $ii++;
              }
            }
            if ($ii == 0) {
              array_push($authors, $key["author"]);
            } else {
              $ii = 0;
            }
          }

          $ganres = array();
          foreach ($rowop as $key) {
            foreach ($ganres as $keyw) {
              if ($key["genre"] == $keyw) {
                $ii++;
              }
            }
            if ($ii == 0) {
              array_push($ganres, $key["genre"]);
            } else {
              $ii = 0;
            }
          }

          $publisher = array();
          foreach ($rowop as $key) {
            foreach ($publisher as $keyw) {
              if ($key["publisher"] == $keyw) {
                $ii++;
              }
            }
            if ($ii == 0) {
              array_push($publisher, $key["publisher"]);
            } else {
              $ii = 0;
            }
          }
        ?>

        <span>Автор:</span>
        <select name="author">
          <option value="all">Все авторы</option>
          <?php
          foreach ($authors as $key) {
            echo "<option value='".$key."'>".$key."</option>";
          }

          ?>
        </select><br>

        <span>Жанр:</span>
        <select name="ganre">
          <option value="all">Все жанры</option>
          <?php
          foreach ($ganres as $key) {
            echo "<option value='".$key."'>".$key."</option>";
          }

          ?>
        </select><br>

        <span>Издатель:</span>
        <select name="publisher">
          <option value="all">Все издатели</option>
          <?php
          foreach ($publisher as $key) {
            echo "<option value='".$key."'>".$key."</option>";
          }

          ?>
        </select><br>

        <input type="submit" name="direction" value="Применить">
      </form>


    </div>

    <div class="poisk">
      <form method="GET" action="poisk.php">
        <input class="search" type="text" name="poisk" placeholder="Поиск по названию книг или по авторам" required>
        <input class="btttt" type="submit" value="Поиск">
      </form>
    </div>
  </div>

<?php
      if ($_SERVER['REQUEST_METHOD']=="POST") {
        if (isset($_POST['author'])) {
        
        if ($_POST['author'] == "all") {
          if ($_POST['ganre'] == "all") {
            if ($_POST['status'] == "all") {
              if ($_POST['cost'] == "all") {
                unset($_SESSION["filter"]);
                unset($_SESSION["sort"]);
              } elseif ($_POST['cost'] == "six") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 6000;");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 6000";
              } elseif ($_POST['cost'] == "four") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 4000 && cost <= 5999;");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 4000 && cost <= 5999";
              } elseif ($_POST['cost'] == "two") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 2000 && cost <= 3999;");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 2000 && cost <= 3999";
              } elseif ($_POST['cost'] == "one") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost <= 1999;");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost <= 1999";
              } 
            } else {
              if ($_POST['cost'] == "all") {
                $qwe = $pdo->query("SELECT * FROM books WHERE status = '".$_POST['status']."'");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE status = '".$_POST['status']."'";
              } elseif ($_POST['cost'] == "six") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 6000 && status = '".$_POST['status']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 6000 && status = '".$_POST['status']."'";
              } elseif ($_POST['cost'] == "four") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && status = '".$_POST['status']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && status = '".$_POST['status']."'";
              } elseif ($_POST['cost'] == "two") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && status = '".$_POST['status']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && status = '".$_POST['status']."'";
              } elseif ($_POST['cost'] == "one") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost <= 1999 && status = '".$_POST['status']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost <= 1999 && status = '".$_POST['status']."'";
              } 
            } 
          } else {
              if ($_POST['status'] == "all") {
              if ($_POST['cost'] == "all") {
                $qwe = $pdo->query("SELECT * FROM books WHERE genre = '".$_POST['ganre']."'");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE genre = '".$_POST['ganre']."'";
              } elseif ($_POST['cost'] == "six") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 6000 && genre = '".$_POST['ganre']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 6000 && genre = '".$_POST['ganre']."'";
              } elseif ($_POST['cost'] == "four") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && genre = '".$_POST['ganre']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && genre = '".$_POST['ganre']."'";
              } elseif ($_POST['cost'] == "two") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && genre = '".$_POST['ganre']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && genre = '".$_POST['ganre']."'";
              } elseif ($_POST['cost'] == "one") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost <= 1999 && genre = '".$_POST['ganre']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost <= 1999 && genre = '".$_POST['ganre']."'";
              } 
            } else {
              if ($_POST['cost'] == "all") {
                $qwe = $pdo->query("SELECT * FROM books WHERE status = '".$_POST['status']."' && genre = '".$_POST['ganre']."'");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE status = '".$_POST['status']."' && genre = '".$_POST['ganre']."'";
              } elseif ($_POST['cost'] == "six") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 6000 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 6000 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."'";
              } elseif ($_POST['cost'] == "four") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."'";
              } elseif ($_POST['cost'] == "two") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."'";
              } elseif ($_POST['cost'] == "one") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost <= 1999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost <= 1999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."'";
              } 
            } 
          } 
        } else {
            if ($_POST['ganre'] == "all") {
            if ($_POST['status'] == "all") {
              if ($_POST['cost'] == "all") {
                $qwe = $pdo->query("SELECT * FROM books WHERE author = '".$_POST['author']."'");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "six") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 6000 && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 6000 && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "four") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "two") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "one") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost <= 1999 && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost <= 1999 && author = '".$_POST['author']."'";
              } 
            } else {
              if ($_POST['cost'] == "all") {
                $qwe = $pdo->query("SELECT * FROM books WHERE status = '".$_POST['status']."' && author = '".$_POST['author']."'");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE status = '".$_POST['status']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "six") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 6000 && status = '".$_POST['status']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 6000 && status = '".$_POST['status']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "four") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && status = '".$_POST['status']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && status = '".$_POST['status']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "two") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && status = '".$_POST['status']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && status = '".$_POST['status']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "one") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost <= 1999 && status = '".$_POST['status']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost <= 1999 && status = '".$_POST['status']."' && author = '".$_POST['author']."'";
              } 
            } 
          } else {
              if ($_POST['status'] == "all") {
              if ($_POST['cost'] == "all") {
                $qwe = $pdo->query("SELECT * FROM books WHERE genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "six") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 6000 && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 6000 && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "four") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "two") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "one") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost <= 1999 && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost <= 1999 && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'";
              } 
            } else {
              if ($_POST['cost'] == "all") {
                $qwe = $pdo->query("SELECT * FROM books WHERE status = '".$_POST['status']."' && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE status = '".$_POST['status']."' && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "six") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 6000 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 6000 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "four") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 4000 && cost <= 5999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "two") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost >= 2000 && cost <= 3999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'";
              } elseif ($_POST['cost'] == "one") {
                $qwe = $pdo->query("SELECT * FROM books WHERE cost <= 1999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."';");
                $ser = $qwe->fetchAll();
                $_SESSION["filter"] = "SELECT * FROM books WHERE cost <= 1999 && status = '".$_POST['status']."' && genre = '".$_POST['ganre']."' && author = '".$_POST['author']."'";
              } 
            } 
          } 
          }
        }
      }

      if (isset($_POST["rank"])) {
          if (isset($_SESSION["filter"])) {
            if ($_POST['rank'] == "base") {
              $qwe = $pdo->query($_SESSION["filter"]);
              $ser = $qwe->fetchAll();
            } elseif ($_POST['rank'] == "cost") {
              if (isset($_SESSION["sort"])) {
                unset($_SESSION["sort"]);
              }
              $_SESSION["sort"] = "cost";
              $qwe = $pdo->query($_SESSION["filter"]." ORDER BY cost ASC;");
              $ser = $qwe->fetchAll();
            } elseif ($_POST['rank'] == "name") {
              if (isset($_SESSION["sort"])) {
                unset($_SESSION["sort"]);
              }
              $_SESSION["sort"] = "name";
              $qwe = $pdo->query($_SESSION["filter"]." ORDER BY name ASC;");
              $ser = $qwe->fetchAll();
            } elseif ($_POST['rank'] == "author") {
              if (isset($_SESSION["sort"])) {
                unset($_SESSION["sort"]);
              }
              $_SESSION["sort"] = "author";
              $qwe = $pdo->query($_SESSION["filter"]." ORDER BY author ASC;");
              $ser = $qwe->fetchAll();
            } elseif ($_POST['rank'] == "date") {
              if (isset($_SESSION["sort"])) {
                unset($_SESSION["sort"]);
              }
              $_SESSION["sort"] = "date";
              $qwe = $pdo->query($_SESSION["filter"]." ORDER BY date ASC;");
              $ser = $qwe->fetchAll();
            } 
          } 
        }

      if (isset($_SESSION["filter"])) {
      if ($ser == null) {
          echo "<p class='pppp'>Найдено 0 книг соответствующий по вашим запросам</p>";
        
      } 
      } 
    ?>

  <div class="news-cat">


    <?php

      if (isset($_SESSION["filter"])) {
      if ($ser != null) {
          
      foreach ($ser as $r) {
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
      } 
      } 
    ?>


    <?php
      if ($_SERVER['REQUEST_METHOD']=="POST") {
        if (!isset($_POST['rank'])) {
          
        } else {
        if (!isset($_SESSION["filter"])) {
            
          
        if ($_POST['rank'] == "base") {
          unset($_SESSION["sort"]);
        } elseif ($_POST['rank'] == "cost") {
          if (isset($_SESSION["sort"])) {
            unset($_SESSION["sort"]);
          }
          $_SESSION["sort"] = "cost";
          $stmtz = $pdo->query("SELECT * FROM books ORDER BY cost ASC;");
          $rowz = $stmtz->fetchAll();

          foreach ($rowz as $r) {
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
        } elseif ($_POST['rank'] == "name") {
          if (isset($_SESSION["sort"])) {
            unset($_SESSION["sort"]);
          }
          $_SESSION["sort"] = "name";
          $stmtzz = $pdo->query("SELECT * FROM books ORDER BY name ASC;");
          $rowzz = $stmtzz->fetchAll();

          foreach ($rowzz as $r) {
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
        } elseif ($_POST['rank'] == "author") {
          if (isset($_SESSION["sort"])) {
            unset($_SESSION["sort"]);
          }
          $_SESSION["sort"] = "author";
          $stmtz = $pdo->query("SELECT * FROM books ORDER BY author ASC;");
          $rowz = $stmtz->fetchAll();

          foreach ($rowz as $r) {
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
        } elseif ($_POST['rank'] == "date") {
          if (isset($_SESSION["sort"])) {
            unset($_SESSION["sort"]);
          }
          $_SESSION["sort"] = "date";
          $stmtz = $pdo->query("SELECT * FROM books ORDER BY date ASC;");
          $rowz = $stmtz->fetchAll();

          foreach ($rowz as $r) {
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
        }
        }
        }
      }
    
    if (!isset($_SESSION["sort"])) {
      if (!isset($_SESSION["filter"])) {
      $stmt = $pdo->query("SELECT * FROM books;");
      $row = $stmt->fetchAll();

      foreach ($row as $r) {
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
    }
    }
    
    ?>
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