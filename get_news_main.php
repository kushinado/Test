<?php
// Подключение к БД
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запрос для получения 3-х последних новостей
$sql = "SELECT title, content, dateNews FROM news ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);

// Создание массива
$newsItems = [];
if ($result->num_rows > 0) {
    // Запись данных в массив
    while($row = $result->fetch_assoc()) {
        $newsItems[] = $row;
    }
} else {
    echo "0 результатов";
}
$conn->close();
?>
