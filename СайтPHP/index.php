<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "nail_appointments";
// Подключение к базе данных
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Установить режим обработки ошибок в PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Установить кодировку UTF-8 для базы данных
    $conn->exec("SET NAMES utf8mb4");
} catch(PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
    // Обработка регистрации
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Хеширование пароля
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Проверка наличия пользователя с таким логином
    $sql = "SELECT * FROM users WHERE login = :login";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Пользователь с таким логином уже существует.";
    } else {
        // Добавление нового пользователя в базу данных
        $sql = "INSERT INTO users (name, phone, login, password, email) VALUES (:name, :phone, :login, :password, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        echo "Регистрация прошла успешно!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="style.css">
 
    <title>Регистрация</title>
</head>
<body>
<div class="header"><h1>Записываемся на ноготочки</h1>
<p class="p1">  <a href="oreder.php"> Заявки</a> <a href="zayava.php"> Бронирование</a></p>
</div>
<div class="footnote">
    <center><h3>Регистрация</h3></center>
<form action="index.php" method="POST">
<div class="Fio">
    <input type="text" id="name" name="name" placeholder="ФИО" require>
</div>

<div class="email1">
    <input type="text" id="email" name="email" placeholder="E-mail" require>
    </div>
    <div class="pass">
    <input type="password" id="password" name="password" placeholder="Пароль"require >
    </div>
    <div class="num">
    <input type="text" id="phone" name="phone" placeholder="Номер телефона" require></div>
    <div class="log">
    <input type="text" name="login" id="login" placeholder="Логин" require></div>
   <!-- Строки ввода данных -->
<input type="submit"  class="but" placeholder="Зарегестрисоваться">
<p><a href="auto.php" class="a1"> Войти</a></p>
<p><a href="admin.php" class="a1">Войти как админ</a></p>
<!-- кнопки перемещения -->
</div>
</div>
</form>

</body>
</html>
