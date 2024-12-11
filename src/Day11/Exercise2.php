<?php

namespace DevDojo\Day11;

class Exercise2
{
    private static array $cache = [0 => 1, 1 => 2024, 2024 => [20, 24]];

    public static function execute(string $input): int
    {
        $numbers = array_map(intval(...), explode(' ', $input));

        return static::walk($numbers, 0);
    }

    public static function walk(array $stones): int
    {
        $reduce = function ($carry, $stone) {
            return $carry + static::cachedBlink($stone, 0);
        };

        return array_reduce($stones, $reduce, 0);
    }

    public static function cachedBlink(int $number, int $count): int
    {
        return static::$cache["{$number}_{$count}"] ??= static::blink($number, $count);
    }

    public static function blink(int $stone, int $step): int
    {
        if ($step === 75) {
            return 1;
        }

        if ($stone === 0) {
            return static::cachedBlink(1, $step + 1);
        }

        if (static::hasEvenDigits($stone)) {
            $numberAsString = (string)$stone;
            $length = strlen($numberAsString);

            $leftPart = substr($numberAsString, 0, $length / 2);
            $rightPart = substr($numberAsString, $length / 2, $length / 2);

            return static::cachedBlink((int)$leftPart, $step + 1) + static::cachedBlink((int)$rightPart, $step + 1);
        }

        return static::cachedBlink($stone * 2024, $step + 1);
    }

    public static function hasEvenDigits(int $number): bool
    {
        $numberAsString = (string)$number;
        $length = strlen($numberAsString);

        return ($length % 2 === 0);
    }
}