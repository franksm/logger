<?php
class CreateSqlite3{
    $pdo = new PDO('sqlite:syslog.sqlite3');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE TABLE IF NOT EXISTS logs (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                level VARCHAR(10) NOT NULL,
                message TEXT NOT NULL
    )");
}





