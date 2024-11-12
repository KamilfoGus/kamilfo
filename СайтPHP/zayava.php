
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="style.css">
<!-- Подключение стилей -->
    <title>Заявка</title>
</head>
<body>
    <div class="header"><h1>Записываемся на ноготочки</h1>
     <!-- Заголовок -->
    <p class="p1"> <a href="index.php">  Выйти</a> <a href="oreder.php"> Заявки</a> <a href="zayava.php"> Бронирование</a></p></div>
  <!-- Кнопки перемещения -->
    <div class="footnote2">
    <div class="order2">
        <br>
    <h2>Оставить заявку</h2>
    <div>
        <form id="text-form" method="POST">
            <input type="text" id="text-input" name="text-input">
            <div class="butpos"> 
            <button type="submit">Добавить</button></div>
        </form>
<H2>Текущие заявки</H2>

    </div >
    <div id="text-list" class="pos"></div>
    <script>
        const form = document.querySelector('#text-form');
        const input = document.querySelector('#text-input');
        const list = document.querySelector('#text-list');

        form.addEventListener('submit', (event) => {
            event.preventDefault(); // Отменяем стандартное поведение отправки формы

            const text = input.value;

            // Добавляем новый элемент списка
            const listItem = document.createElement('div');
            listItem.textContent = text;
            list.appendChild(listItem);

            // Очищаем текстовое поле
            input.value = '';
        });
    </script>
    </div>   
</form>
</body>
</html>