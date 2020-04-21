<?php
    session_start();
    if (empty($_SESSION['login'])) {
        header("Location: http://".$_SERVER['HTTP_HOST']."/");
    }
    echo "Вы вошли на сайт, как ".$_SESSION['login']."<br>";
    echo "<a  href='/exit.php'>Выйти</a>";

require_once 'db.php';

    echo "<table border='1'>";
    foreach($connection->query('SELECT * FROM users') as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td><td>" . $row['login'] . "</td>";
        echo "</tr>";
    };
    echo "</table>";