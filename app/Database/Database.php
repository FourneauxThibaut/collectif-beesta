<?php

namespace Database;

use PDO;
use PDOException;
use Delight\Db\PdoDatabase;


class Database
{
    static private $instance;

//      ┌───────────┐
//      │  CONNECT  │
//      └───────────┘
    static function connect()
    {
        // if (empty(static::$instance)) {

        //     try {
        //         $pdo = new PDO('mysql:host=' . DATABASE_CONFIG['hostname'] . ';dbname=' . DATABASE_CONFIG['database'], DATABASE_CONFIG['username'], DATABASE_CONFIG['password']);
        //         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     }
        //     catch (PDOException $e) {
        //         echo 'Erreur : ' . $e->getMessage();
        //         die();
        //     }

        //     static::$instance = PdoDatabase::fromPdo($pdo);
        // }

        return static::$instance;
    }
}
