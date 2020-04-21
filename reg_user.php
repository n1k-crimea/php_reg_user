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

    $check_user = $connection->prepare("SELECT login FROM users WHERE login= :login");
    $check_user->bindParam(':login',$login);
    $check_user->execute();
    $row = $check_user->fetch(PDO::FETCH_ASSOC);
    if (!empty($row['login'])) {
        exit ("логин занят. Вернуться <a href='/'>НАЗАД</a>");
    };

    $insert_user = $connection->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
    $insert_user->execute(array($login, $password));
    if ($insert_user) {
        $_SESSION['login'] = $login;
        header('Location: list_users.php');
    }
    else {
        echo "Ошибка! Вы не зарегистрированы. Вернуться <a href='/'>НАЗАД</a>";
    }