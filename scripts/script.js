// Получение формы при нажатии на кнопку
document.getElementById('feedbackForm').addEventListener('submit', function(event) {
    event.preventDefault();     // <--- Отмена стандартного поведения формы (отправка данных и перезагрузка страницы)
    
    let phone = document.getElementById('phone').value;     // <--- Получение данных с поля "Телефон"

    // Проверка на то, чтобы номер телефона соответствовал требованиям в 11 символов и содержал только цифры
    if (!/^\d{11}$/.test(phone)) {
        document.getElementById('response').innerHTML = 'Телефон должен содержать только цифры и быть длиной 11 символов';
        return;
    }
    
    let formData = new FormData(this);      // <--- Получение введенных данных в форму для дальнейшей отправки на сервер

    // Отправка данных формы на сервер через fetch API
    fetch('process_form.php', {
        method: 'POST',
        body: formData      // <--- Данные формы
    })
    .then(response => response.text())      // <--- Преобразование ответа сервера в текст
    .then(data => {
        document.getElementById('response').innerHTML = data;      // <--- Отображение ответа сервера в элементе id="responce"
        fetchFeedbackData();   // <--- Запрос на обновленные данные
    })
    .catch(error => console.error('Error:', error));
});

// Функция получения данных формы
function fetchFeedbackData() {
    fetch('process_form.php?action=fetch')      // <--- Запрос на получение данных с сервера
    .then(response => response.text())
    .then(data => {
        document.getElementById('response').innerHTML = data;       // <--- Отображение данных в элементе id="responce"
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', fetchFeedbackData);
