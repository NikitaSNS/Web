<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 26.03.2017
 * Time: 19:28
 */
class Database
{
    protected static $db;

    private $_connection;

    private function __construct()
    {
        $settings = parse_ini_file(ROOT . '/app/settings.ini');

        $this->_connection = new mysqli($settings['host'], $settings['login'], $settings['password'], $settings['db_name']);
        $this->_connection->set_charset('utf8');
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

    public function __destruct()
    {
        $this->_connection->close();
    }
}