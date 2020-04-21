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

    $check_user = $connection->query("SELECT login FROM users WHERE login='$login'");
    $row = $check_user->fetch(PDO::FETCH_ASSOC);
    if (!empty($row['login'])) {
        exit ("логин занят");
    };

    $insert_user = $connection->exec("INSERT INTO users (login, password) VALUES ('$login', '$password')");
    if ($insert_user) {
        echo "Регистрация прошла";
        echo "<table border='1'>";
        foreach($connection->query('SELECT * FROM users') as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td><td>" . $row['login'] . "</td>";
            echo "</tr>";
        };
        echo "</table>";
    }
    else {
        echo "Ошибка! Вы не зарегистрированы. Вернуться <a href='/'>НАЗАД</a>";
    }
?>