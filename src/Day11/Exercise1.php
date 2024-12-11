<?php

namespace DevDojo\Day11;

class Exercise1
{

    public static function execute(string $input): int
    {
        $numbers = explode(' ', $input);

        return static::blink($numbers, 0);
    }

    public static function blink(array $numbers, int $count): int
    {
        $memory = (int)(memory_get_usage() / 1024 );

        if ($count === 25) {
            return count($numbers);
        }

        $sum = 0;

        foreach ($numbers as $number) {
            $result = static::applyRules($number);

            $sum += static::blink($result, $count + 1);
        }

        return $sum;
    }

    private static function applyRules(int $number): array
    {
        if ($number === 0) {
            return [1];
        }

        $numberAsString = (string)$number;
        $length = strlen($numberAsString);
        if ($length % 2 === 0) {
            $leftPart = substr($numberAsString, 0, $length / 2);
            $rightPart = substr($numberAsString, $length / 2, $length / 2);

            return [(int)$leftPart, (int)$rightPart];
        }

        return [$number * 2024];
    }
}