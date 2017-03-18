<?php
// 6. Создать функцию, которая требуется округлить число с плавающей точкой до заданного количества разрядов в дробной части.


var_dump(roundFloat(-2.6974324233, 2));

function roundFloat(float $number, int $precision)
{
    $power = pow(10, $precision);

    $newNumber = $number * $power;

    if (abs($newNumber - (int)$newNumber) >= 0.5) {
        if (isNegative($number)) {
            $newNumber--;
        } else {
            $newNumber++;
        }
    }

    return (int)$newNumber / $power;
}

function isNegative($number)
{
    return $number < 0;
}
