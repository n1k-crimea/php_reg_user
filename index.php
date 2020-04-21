<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>
<body>
<div style="display: flex; flex-direction: row; justify-content: flex-start;">
    <div>
        <p>Регистрация</p>
        <form action="reg_user.php" method="POST">
        <p>
            <label>Логин:<br></label>
            <input name="login" type="text" size="15" maxlength="15" required>
        </p>
        <p>
            <label>Пароль:<br></label>
            <input name="password" type="password" size="15" maxlength="128" required>
        </p>
        <p>
            <input type="submit" name="submit" value="Зарегистрироваться">
        </p>
        </form>
    </div>
    <div>
        <p>Вход</p>
        <form action="login_user.php" method="POST">
        <p>
            <label>Ваш логин:<br></label>
            <input name="login" type="text" size="15" maxlength="15" required>
        </p>
        <p>
            <label>Ваш пароль:<br></label>
            <input name="password" type="password" size="15" maxlength="128" required>
        </p>
        <p>
            <input type="submit" name="submit" value="Войти">
        </p></form>
        <br>
        <?php
            if (empty($_SESSION['login'])) {
            echo "Вы вошли как гость<br>";
        }
        else {
            echo "Вы вошли как ".$_SESSION['login']."<br><a  href='/list_users.php'>Список пользователей</a><br>";
            echo "<a  href='/exit.php'>Выйти</a>";
        }
        ?>
    </div>
</div>
</body>
</html>