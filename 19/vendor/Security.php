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

    public static function checkXss(array $fields): bool
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

    public static function isBanned(): bool
    {
        return isset($_SESSION['ban_expiration']) && $_SESSION['ban_expiration'] > (new DateTime());
    }

    public static function ban(int $min): void
    {
        $_SESSION['ban'] = true;
        $_SESSION['ban_time'] = new DateTime();
        $_SESSION['ban_expiration'] = (clone ($_SESSION['ban_time']))->modify('+' . $min . ' minutes');
        var_dump($_SESSION);
    }

    public static function checkSecurity(array $fields): bool
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

    public static function generatePassword($password): string
    {
        return md5(md5($password) . md5($password) . sha1(md5($password)));
    }

    public static function checkUser($db, $login)
    {
        $query = $db->prepare('SELECT COUNT(*) AS `count` FROM users WHERE login=?');
        $query->bind_param('s', $login);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();

        return $result['count'] > 0;
    }

    public static function getInfoAboutUser($db, string $login)
    {
        $query = $db->prepare('SELECT * FROM users WHERE login=?');
        $query->bind_param('s', $login);
        $query->execute();

        return $query->get_result()->fetch_assoc();
    }

    public static function saveInfo(string $key, string $info)
    {
        $_SESSION['save'][$key] = $info;
    }

    public static function getInfo(string $key = null)
    {
        if ($key === null) {
            return $_SESSION['save'];
        }

        return $_SESSION['save'][$key];
    }
}