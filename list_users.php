<?php
    require_once 'db.php';
    echo "<table border='1'>";
    foreach($connection->query('SELECT * FROM users') as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td><td>" . $row['login'] . "</td>";
        echo "</tr>";
    };
    echo "</table>";