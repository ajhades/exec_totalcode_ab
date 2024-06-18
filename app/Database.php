<?php

namespace App;

use PDO;
use PDOException;

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $config = require __DIR__ . '/../config/database.php';
        
        $driver = $config['connections']['mysql']['driver'];
        $host = $config['connections']['mysql']['host'];
        $db = $config['connections']['mysql']['database'];
        $user = $config['connections']['mysql']['username'];
        $pass = $config['connections']['mysql']['password'];
        $charset = 'utf8mb4';

        $dsn = "$driver:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->connection = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
