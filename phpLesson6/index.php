<?php

/*
 * В пхп стоит разлечать объекты и классы ибо
 * вызов объектов и классов различен
 */

class DB
{
    public $login;
    private $password;
    protected $dbName;

    public function __construct(string $login, string $password, string $dbName)
    {
        $this->login = $login;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    public function __destruct()
    {
        echo '<h3>Я уничтожаюсь</h3>';
        unset($this->login);
        unset($this->password);
        unset($this->dbName);
    }

    public function show()
    {
//        echo $this->login . ' ' . $this->password . ' ' . $this->dbName . '<br>';
    }

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    public function __get($name)
    {
        return $this->{$name};
    }
}

echo '<pre>';

$db = new DB('Login','Password','dbName');
//$db->show();
//$object = &$db;
//$object->show();
//$clonedObj = clone $db;
//$db->login = 'CLONED';
//$db->show();
//$clonedObj->show();

// Наследование в PHP С помощью слова extends

class Two extends DB
{
    const NAME = 'd';

    public function show()
    {
        echo 'NAME : ' . self::NAME . '<br>';
        self::staticFunction();
    }

    public static function staticFunction()
    {
        echo 'Static function';
    }
}

$two = new Two('a', 'b', 'c');
//$two->show();
// :: - Разрешения области видимости, это конструкция позволяющая
// обращаться к статическим свойстам, константам
// и перегруженным свойствам и методам класса
//DB::show();


// Абстрактные классы и методы

abstract class Groups
{
    public $studs = 'studs';

    public function rating()
    {

    }
}

class Poks extends Groups
{
    public function rating()
    {
        echo $this->studs;
    }
}

$poks = new Poks();
$poks->rating();

// Финальные

class SomeClass
{
    public final function finalMethod()
    {
        echo 'Final method <br>';
    }
}

final class FinalClass extends SomeClass
{

}

echo '<pre>';
var_dump($two instanceof DB);
var_dump($db instanceof DB);
var_dump($db instanceof FinalClass);