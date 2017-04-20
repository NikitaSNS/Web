<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 19.04.2017
 * Time: 21:33
 */
class Security
{
    public static function checkSqlInjection(array $fields)
    {
        $isFind = false;
        foreach ($fields as $field) {
            if (is_array($field)) {
                if (self::checkSqlInjection($field)) {
                    return !$isFind;
                } else {
                    continue;
                }
            }
            if (preg_match("/('|(--)|;)/i", $field)) {
                return !$isFind;
            }
        }

        return $isFind;
    }

    public static function checkXss(array $fields) : bool
    {
        $isFind = false;
        foreach ($fields as $field) {
            if (is_array($field)) {
                if (self::checkXss($field)) {
                    return !$isFind;
                } else {
                    continue;
                }
            }
            if (preg_match('~((?><script(?:(?:\s+(?:"[\S\s]*?"|\'[\S\s]*?\'|[^>]*?)+)|/)>)(?<=/>)|(?><script(?:\s+(?:"[\S\s]*?"|\'[\S\s]*?\'|[^>]*?)+)?>)(?<!/>)[\S\s]*?</script\s*>)~'
                , $field)) {
                return !$isFind;
            }
        }

        return $isFind;
    }

    public static function isBanned() : bool
    {
        return isset($_SESSION['ban_expiration']) && $_SESSION['ban_expiration'] > (new DateTime());
    }

    public static function ban(int $min) : void
    {
        $_SESSION['ban'] = true;
        $_SESSION['ban_time'] = new DateTime();
        $_SESSION['ban_expiration'] = (clone ($_SESSION['ban_time']))->modify('+' . $min . ' minutes');
        var_dump($_SESSION);
    }

    public static function checkSecurity(array $fields) : bool
    {
        if (self::isBanned()) {
            return false;
        }

        if (self::checkXss($fields)) {
            self::ban(3);

            return false;
        } elseif (self::checkSqlInjection($fields)) {
            self::ban(5);

            return false;
        }

        return true;
    }

    public static function generatePassword($password, $login) : string
    {
        return md5(md5($password) . $login);
    }
}