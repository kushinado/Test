<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/feedbackStyle.css">
  <title>Обратная связь</title>
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
    <!-- Форма обратной связи -->
    <div class="form-container">
      <form id="feedbackForm">
        <h2>Обратная связь</h2>
        <!-- Поле ФИО -->
        <label for="fullname">ФИО:</label>
        <input type="text" id="fullname" name="fullname" required>
        <!-- Поле адрес -->
        <label for="address">Адрес:</label>
        <input type="text" id="address" name="address" required>
        <!-- Поле телефон -->
        <label for="phone">Телефон:</label>
        <input type="text" id="phone" name="phone" pattern="\d{11}" maxlength="11" required>
        <!-- Поле email -->
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <!-- Кнопка отправить -->
        <button type="submit">Отправить</button>
      </form>
      <!-- Сообщение об успешном или неуспешном добавлении записи -->
      <div id="response"></div>
    </div>
    <!-- Подключение JS файла -->
    <script src="scripts/script.js"></script>
  </main>
</body>
</html>
