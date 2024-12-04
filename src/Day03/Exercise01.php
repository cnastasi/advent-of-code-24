<?php

namespace DevDojo\Day03;

class Exercise01
{
    const REGEX = "/mul\(([0-9]{1,3}),([0-9]{1,3})\)/";
    public static function execute(string $input)
    {
        preg_match_all(self::REGEX, $input, $matches);

        return static::multiplyAll($matches[1], $matches[2]);
    }

    private static function multiplyAll(array $multipliers1, array $multipliers2): int {
        $sum = 0;

        for($i = 0; $i < count($multipliers1); $i++) {
            $sum += $multipliers1[$i] * $multipliers2[$i];
        }

        return $sum;
    }
}