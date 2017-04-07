<?php

class DB
{
    private $connection;

    public function __construct($login, $password, $dbName, $url)
    {
        $this->connection = new mysqli($url, $login, $password, $dbName);
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    public function query($sql)
    {
        $res = $this->connection->query($sql);

        if (!$res) {
            return mysqli_error($this->connection);
        }

        return $res;
    }
}
