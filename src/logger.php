<?php

namespace Php\Exam;

use Psr\Log\LoggerInterface;
use \PDO;

class Logger implements LoggerInterface
{
    private $pdo;

    public function __construct(){
        $pdo = new PDO('sqlite:syslog.sqlite3');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $pdo->exec("CREATE TABLE IF NOT EXISTS logs (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                level VARCHAR(10) NOT NULL,
                message TEXT NOT NULL
        )");

        $this->pdo = $pdo;
    }

    public function emergency($message, array $context = array()){
        return;
    }

    public function alert($message, array $context = array()){
        return;
    }
    /** use */
    public function critical($message, array $context = array()){
        $this->insert(__FUNCTION__, $message);
    }
    /** use */
    public function error($message, array $context = array()){
        $this->insert(__FUNCTION__, $message);
    }

    public function warning($message, array $context = array()){
        return;
    }
    /** use */
    public function notice($message, array $context = array()){
        $this->insert(__FUNCTION__, $message);
    }
    /** use */
    public function info($message, array $context = array()){
        $this->insert(__FUNCTION__, $message);
    }
    /** use */
    public function debug($message, array $context = array()){
        $this->insert(__FUNCTION__, $message);
    }

    public function log($level, $message, array $context = array()){
        return;
    }

    function insert($stage, $message){
        $sql = "INSERT Into logs(level,message) Values (:level,:message)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':level',$stage);
        $stmt->bindValue(':message',$message);
        $stmt->execute();
        echo  "$stage\t$message\n";
    }

}
