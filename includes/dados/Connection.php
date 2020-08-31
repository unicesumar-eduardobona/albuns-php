<?php

class Connection
{
    private static $instance;
    public $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=db;dbname=albuns_php;charset=utf8', 'unicesumar', 'unicesumar');
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
