<?php

$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);

$name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);

$pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 3 || mb_strlen($login) > 10) {
    echo "Login Failed";
    exit();
} else if(mb_strlen($name) < 3 || mb_strlen($name) > 20) {
    echo "Немение 3 символов";
    exit();
} else if(mb_strlen($pass) < 8 || mb_strlen($pass) > 90) {
    echo "Ошибка. Пароль меньше 8 символов";
    exit();
}

// Подключение MySql

$conn = new mysqli("localhost", "root", "123", "BD_test");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "INSERT INTO `users` (`login`, `pass`, `name`) VALUES ('$login', '$pass', '$name')";
if($conn->query($sql)){
    echo "Данные успешно добавлены";
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();

header('Location: /main.html');

?>
