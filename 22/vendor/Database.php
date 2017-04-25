<?php

class Database
{
    protected static $db;

    private $_connection;

    private function __construct()
    {
        $settings = parse_ini_file(__DIR__ . '/../configs/settings.ini');

        $this->_connection = mysqli_connect($settings['host'], $settings['login'], $settings['password'],
            $settings['db_name']);

        mysqli_set_charset($this->_connection, 'utf8');
    }

    /**
     * @return Database
     */
    public static function getInstance()
    {
        if (self::$db === null) {
            self::$db = new self();
        }

        return self::$db;
    }

    public function getConnection()
    {
        return $this->_connection;
    }
}