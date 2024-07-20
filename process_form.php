<?php
// Подключение к БД test
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Извлечение данных из файла feedback.php
    $fullname = $conn->real_escape_string($_POST['fullname']);      // <----ФИО
    $address = $conn->real_escape_string($_POST['address']);        // <----адрес
    $phone = $conn->real_escape_string($_POST['phone']);            // <----телефон
    $email = $conn->real_escape_string($_POST['email']);            // <----email

    // Проверка на пустые значения и корректность номера телефона
    if (!empty($fullname) && !empty($address) && !empty($phone) && !empty($email)) {
        if (preg_match('/^\d{11}$/', $phone)) {     // Кол-во символов номере должно быть не меньше 11
            $sql = "INSERT INTO feedback (fullname, address, phone, email) VALUES ('$fullname', '$address', '$phone', '$email')";       // Добавление данных в таблицу feedback
            if ($conn->query($sql) === TRUE) {
                echo "Вы успешно добавили новую запись!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Телефон должен содержать только цифры и быть длиной 11 символов";
        }
    } else {
        echo "Необходимо заполнить все поля!";
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'fetch') {
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);

    // Создание таблицы с данными на странице
    if ($result->num_rows > 0) {
        echo "<table><thead><tr><th>ID</th><th>ФИО</th><th>Адрес</th><th>Телефон</th><th>E-mail</th></tr></thead><tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td data-label='ID'>" . $row["ID"]. "</td><td data-label='ФИО'>" . $row["fullname"]. "</td><td data-label='Адрес'>" . $row["address"]. "</td><td data-label='Телефон'>" . $row["phone"]. "</td><td data-label='E-mail'>" . $row["email"]. "</td></tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "0 результатов";
    }
}

$conn->close();
?>
