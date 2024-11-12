<?php

$host = 'localhost';
$db = 'my_database';
$user = 'FIO';
$pass = 'password';

try {

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $FIO = $_POST['FIO'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

      
        $stmt = $pdo->prepare("INSERT INTO users (FIO, email, password) VALUES (:FIO, :email, :password)");
        $stmt->bindParam(':FIO', $FIO);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);


        if ($stmt->execute()) {
            echo "Регистрация прошла успешно";
        } else {
            echo "Ошибка при регистрации.";
        }
    }
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>