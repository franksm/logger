<?php
namespace CreateSqlite3;

class CreateSqlite3{

    public function desc(){
        $pdo = new PDO('sqlite:syslog.sqlite3');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $pdo->exec("CREATE TABLE IF NOT EXISTS logs (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                level VARCHAR(10) NOT NULL,
                message TEXT NOT NULL
        )");
    }
}





