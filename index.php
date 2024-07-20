<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/MainStyle.css">
	<title>Главная страница</title>
</head>
<body>
	<!-- Хедер страницы -->
	<header>
		<!-- Блок хедера -->
		<div id="headerBlock">
			<!-- Ссылки -->
			<div class="headerLinks">
				<a href="index.php">Главная</a>
				<a href="feedback.php">Обратная связь</a>
				<a href="news.php">Новости</a>
			</div>
		</div>
	</header>
	<!-- Основной контент -->
	<main>
		<!-- PHP код для отображения новостей -->
    <div class="news-container">
      <?php
      // Получение 3-х последних новостей из файла get_news_main.php
      include 'get_news_main.php';

      // Отображение новостей
      foreach ($newsItems as $news) {
          echo "<div class='news-block'>";
          echo "<h2>" . $news['title'] . "</h2>";
          echo "<p>" . $news['content'] . "</p>";
          echo "<p class='news-date'>" . $news['dateNews'] . "</p>";
          echo "</div>";
      }
      ?>
      </div>
    <!-- Ссылки на страницу новостей и формы обратной связи -->
		<div class="anotherLinks">
			<a href="news.php">Все новости</a>
			<a href="feedback.php">Обратная связь</a>
		</div>
	</main>
</body>
</html>
