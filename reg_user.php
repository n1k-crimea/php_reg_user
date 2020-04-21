<?php
    if (isset($_POST['login']) and isset($_POST['password'])) {
        $login = $_POST['login'];
        $password=$_POST['password'];
    };
    if (empty($login) or empty($password)) {
        exit("Не все поля запонены");
    };
    $login = trim($login);
    $password = trim($password);

    require_once 'db.php';

    $check_user = $connection->prepare("SELECT login FROM users WHERE login= :login");
    $check_user->bindParam(':login',$login);
    $check_user->execute();
    $row = $check_user->fetch(PDO::FETCH_ASSOC);
    if (!empty($row['login'])) {
        exit ("логин занят. Вернуться <a href='/'>НАЗАД</a>");
    };

    //$insert_user = $connection->exec("INSERT INTO users (login, password) VALUES (".$connection->quote($login).",".$connection->quote($password).")");
    $insert_user = $connection->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
    $insert_user->bindParam(':login', $login);
    $insert_user->bindParam(':password', $password);
    $insert_user->execute();
    if ($insert_user) {
        header('Location: list_users.php');
    }
    else {
        echo "Ошибка! Вы не зарегистрированы. Вернуться <a href='/'>НАЗАД</a>";
    }