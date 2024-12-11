<?php

namespace DevDojo\Day11;

class Exercise2
{
    public static function execute(string $input): int
    {
        $numbers = explode(' ', $input);

        $sum = 0;

        foreach ($numbers as $number) {
            $sum += static::blink($number, 0);
        }

        return $sum;
    }

    public static function blink(int $number, int $count): int
    {
//        $memory = (int)(memory_get_usage() / 1024);/**/

        if ($count === 75) {
            return 1;
        }

        if ($number === 0) {
            return static::blink(1, $count + 1);
        } else if (static::hasEvenDigits($number)) {
            $numberAsString = (string)$number;
            $length = strlen($numberAsString);

            $leftPart = substr($numberAsString, 0, $length / 2);
            $rightPart = substr($numberAsString, $length / 2, $length / 2);

            return static::blink((int)$leftPart, $count + 1) + static::blink((int)$rightPart, $count + 1);
        }

        return static::blink($number * 2024, $count + 1);
    }

    public static function hasEvenDigits(int $number): bool
    {
        $numberAsString = (string)$number;
        $length = strlen($numberAsString);

        return ($length % 2 === 0);
    }
}