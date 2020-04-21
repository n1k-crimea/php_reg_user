<?php
    session_start();
    if (isset($_POST['login']) and isset($_POST['password'])) {
        $login = $_POST['login'];
        $password=$_POST['password'];
    };
    $login = trim($login);
    $password = trim($password);
    if (empty($login) or empty($password)) {
        exit("Не все поля запонены");
    };

require_once 'db.php';

    $check_user = $connection->prepare("SELECT * FROM users WHERE login= :login");
    $check_user->bindParam(':login',$login);
    $check_user->execute();
    $row = $check_user->fetch(PDO::FETCH_ASSOC);
    if (empty($row['id'])) {
        exit ("введённый вами login неверный. Вернуться <a href='/'>НАЗАД</a>");
    }
    else {
        if ($row['password'] == $password) {
            $_SESSION['login'] = $row['login']; 
            $_SESSION['id'] = $row['id'];
            header('Location: list_users.php');;
        }
        else {
            exit ("введённый вами пароль неверный. Вернуться <a href='/'>НАЗАД</a>");
        }
    }
?>