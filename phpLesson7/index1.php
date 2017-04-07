<?php

// Тема : Множественное наследование в PHP

// 1. Интерфейсы

interface RKSI
{
    public function Poks();

    public function Pi();

    public function Ks();
}

interface Study
{
    public function School();
}

interface KinderGarder extends Study
{
    public function qq();
}

class Sovet implements RKSI, Study
{

    public function Poks()
    {
        // TODO: Implement Poks() method.
    }

    public function Pi()
    {
        // TODO: Implement Pi() method.
    }

    public function Ks()
    {
        // TODO: Implement Ks() method.
    }

    public function School()
    {
        // TODO: Implement School() method.
    }

    public function qq()
    {
        // TODO: Implement qq() method.
    }
}

class West extends Sovet implements RKSI, KinderGarder
{

}

class North implements RKSI, Study
{

    public function Poks()
    {
        // TODO: Implement Poks() method.
    }

    public function Pi()
    {
        // TODO: Implement Pi() method.
    }

    public function Ks()
    {
        // TODO: Implement Ks() method.
    }

    public function School()
    {
        // TODO: Implement School() method.
    }

    public function qq()
    {
        // TODO: Implement qq() method.
    }
}

