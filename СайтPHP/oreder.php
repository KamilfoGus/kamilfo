<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="style.css">
 <!-- Подключение стилей -->
    <title>Бронирование</title>
</head>
<body>
<div class="header"><h1>Записываемся на ноготочки</h1> <!-- Заголовок -->
<p class="p1"> <a href="index.php">  Выйти</a> <a href="oreder.php"> Заявки</a> <a href="zayava.php"> Бронирование</a></p>
</div>  <!-- Кнопки перемещения -->
<div class="footnote3">
<div class="nomer">
    <br><br><br>
    <h2>Запись к мастеру</h2>
    <form method="POST">
        <div class="selectna">
<select name="name" id="name">

<option value="">- - - -</option>
<option value="">Анна Иванова</option>
<option value="">Гузель Баркова</option>
<option value="">Игорь Шматко</option>
<option value="">Инокентий Власов</option>
<option value="">Анастасия Пушева</option>
</select><lable> На время</lable>
<select name="time" id="time">
<option value="">- - - -</option>
<option value="">8:00-9:00</option>
<option value="">9:00-10:00</option>
<option value="">10:00-11:00</option>
<option value="">11:00-12:00</option>
<option value="">12:00-13:00</option>
<option value="">13:00-14:00</option>
<option value="">14:00-15:00</option>
<option value="">15:00-16:00</option>
<option value="">16:00-17:00</option>
<option value="">17:00-18:00</option>
</select>
<input type="date">
<button>Отправить</button>
<!-- Выпадающие списки и кнопка отправки -->
</div>
</div>

</form>
</body>
</html>
