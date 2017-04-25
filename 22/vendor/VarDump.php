<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 20.04.2017
 * Time: 13:21
 */
class VarDump
{
    public static function dump($variable)
    {
        highlight_string("<?php\n\$$variable =\n" . var_export($variable, true) . ";\n?>");
    }
}