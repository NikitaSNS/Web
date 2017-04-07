<?php

// Трейты

trait Casino
{
    private $name;

    public function displaySuccess()
    {
        echo $this->name . ' Success';
    }

    public function displayFail()
    {
        echo $this->name . ' Fail';
    }
}

class JoyCasino
{
    use Casino;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function displaySuccess()
    {
        echo 'Перегруженный метод трейта';
    }
}

$casino = new JoyCasino('Vasya');
JoyCasino::displaySuccess();
$casino->displayFail();
