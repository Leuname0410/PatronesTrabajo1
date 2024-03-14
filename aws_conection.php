<?php

# Patrones usados: Singleton y Factory

interface Connection {

    public function getConnection();
}

class ServerConnection implements Connection {

    private static $instance;
    private $serverIp = 'ip example';
    private $serverKey = 'key example';
    private $connection;

    private function __construct() {

        $this->connection = true;
    }

    public static function getInstance() {

        if (!isset(self::$instance)) {

            self::$instance = new self();
            echo 'Create new instance'.'<br/>';
        } else {

            echo 'Existing instance'.'<br/>';
        }

        return self::$instance;
    }

    public function getConnection() {

        if ($this->connection == false) {

            echo 'No connection'.'<br/>';
        } else {

            echo 'Connection success'.'<br/>';
        }
    }
}

class ConnectionFactory {
    
    public static function createConnection() {

        return ServerConnection::getInstance();
    }
}

echo 'PC 1 creating DB instance <br/>';
$newConnection1 = ConnectionFactory::createConnection();
$server = $newConnection1->getConnection();
echo 'Get instance #1' . '<br/>';
echo '<br/>';

echo 'PC 2 creating DB instance <br/>';
$newConnection2 = ConnectionFactory::createConnection();
$server = $newConnection2->getConnection();
echo 'Get instance #2:' . '<br/>';
echo '<br/>';

echo 'PC 3 creating DB instance <br/>';
$newConnection3 = ConnectionFactory::createConnection();
$server = $newConnection3->getConnection();
echo 'Get instance #3' . '<br/>';
echo '<br/>';

