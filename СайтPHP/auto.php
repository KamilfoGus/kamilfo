<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "nail_appointments";
// Подключение к базе данных
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES utf8mb4");
} catch(PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}

// Обработка регистрации
if (isset($_POST['register'])) {

}

// Обработка авторизации
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE login = :login";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Проверка пароля
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id']; // Сохраняем ID пользователя в сессию
            echo "Авторизация прошла успешно!";
            header("Location: your_page.php"); // Перенаправляем на страницу, доступную только авторизованным пользователям
            exit;
        } else {
            echo "Неверный пароль.";
        }
    } else {
        echo "Пользователь с таким логином не найден.";
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
    <!-- Подключение стилей -->
    <title>Авторизация</title>
</head>
<body>
    <div class="header"><h1>Записываемся на ноготочки</h1>
    <p class="p1"> <a href="index.php">  Выйти</a> <a href="oreder.php"> Заявки</a> <a href="zayava.php"> Бронирование</a></p>
    </div>  <!-- Кнопки перемещения -->

    <div class="footnotead">
        <center><h3>Авторизация</h3></center>
<form action="auto.php" method="POST">
    <div class="login">
        <input type="text" id="login" name="login" placeholder="Логин" require>
        </div>
    <div class="pass">
        <input type="password" id="password" name="password" placeholder="Пароль" require>
        </div>
   <!-- Строки ввода данных -->

   <input type="submit" class="but" placeholder="Войти">
        </div>
        </div>
</form> 
        




</body>
</html>