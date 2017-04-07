<?php

class Database
{
    private static $db = null;
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli('localhost', 'root', '', 'pract6');
        $this->mysqli->set_charset('utf8');
    }

    public static function getDb()
    {
        if (self::$db === null) {
            self::$db = new self();
        }

        return self::$db;
    }

    public function query($sql)
    {
        return $this->mysqli->query($sql) ? true : false;
    }

    public function select($sql)
    {
        $res = $this->mysqli->query($sql);

        if ($res) {
            return $res->fetch_all();
        }

        return false;
    }
}