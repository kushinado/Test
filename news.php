<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/newsStyle.css">
	<title>Новости</title>
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
        // Получение новостей из файла get_news.php
        include 'get_news.php';

        // Отображаем новости
        foreach ($newsItems as $news) {
            echo "<div class='news-block'>";
            echo "<h2>" . $news['title'] . "</h2>";
            echo "<p>" . $news['content'] . "</p>";
            echo "<p class='news-date'>" . $news['dateNews'] . "</p>";
            echo "</div>";
        }
        ?>
        </div>
	</main>
</body>
</html>
