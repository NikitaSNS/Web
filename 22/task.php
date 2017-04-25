<?php


//trait AbsTrait
//{
//    private $a;
//    private $b;
//    private $c;
//
//    function __construct()
//    {
//        $this->a = $this->b = $this->c = '';
//    }
//}
//
//abstract class AbsClass
//{
//    use AbsTrait;
//}
//
//
//class Returner
//{
//    public static function getAbstractClass()
//    {
//        return (new class extends AbsClass {
//            public function getLoader()
//            {
//                return
//            }
//        });
//    }
//}
//echo '<pre>';
//$class = Returner::getAbstractClass();
//$obj = new $class();
//var_dump($obj);
//$obj->Echo('123');
//
//
//$destroyer = function () use (&$obj) {
//    unset($obj);
//};
//
//$destroyer();
//


trait AbsTrait
{
    protected $directorys;

    function __construct()
    {
        $this->directorys = [
            __DIR__ . '/../vendor/',
        ];
    }
}

abstract class AbsClass
{
    use AbsTrait;
}


class Returner
{
    public static function getAbstractClass()
    {
        return (new class extends AbsClass
        {
            public function getLoader()
            {
                $this->directorys;
                return function ($className) {
                    //class directories
//                    $directorys = [
//                        __DIR__ . '/../vendor/',
//                    ];

                    var_dump($this->directorys);

                    //for each directory
                    foreach ($this->directorys as $directory) {
                        //see if the file exsists
                        if (file_exists($directory . $className . '.php')) {
                            require_once($directory . $className . '.php');

                            //only require the class once, so quit after to save effort (if you got more, then name them something else
                            return;
                        }
                    }
                };
            }
        });
    }
}

echo '<pre>';
$class = Returner::getAbstractClass();
$obj = new $class();
var_dump($obj);

$destroyer = function () use (&$obj) {
    unset($obj);
};

