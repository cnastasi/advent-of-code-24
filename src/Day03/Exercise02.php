<?php

namespace DevDojo\Day03;



class Exercise02
{
    const REGEX1 = "/mul\(([0-9]{1,3}),([0-9]{1,3})\)/";
    const REGEX2 = "/don't\\(\\)(.*?)do\\(\\)/s";
    public static function execute(string $input)
    {
        preg_match_all(self::REGEX1, $input, $matches);

        $result1 = static::multiplyAll($matches[1], $matches[2]);

        preg_match_all(self::REGEX2, $input, $matches);

        var_dump($matches);

        $result2 = static::multiplyAll($matches[1], $matches[2]);

        return $result1 - $result2;
    }

    public static function galleaSolution(string $input)
    {
        $initial = self::executeInstructions($input);

        $matches = [];

        $pattern = "/don't\\(\\)(.*?)do\\(\\)/s";

        preg_match_all($pattern, $input, $matches);
        return array_reduce(
            $matches[1],
            fn ($carry, $item) => $carry - self::executeInstructions($item),
            $initial
        );
    }

    public static function executeInstructions($list): int
    {
        $matches = [];
        $pattern = '/mul\((\d+),(\d+)\)/';
        preg_match_all($pattern, $list, $matches);
        return array_reduce(
            array_map(function ($num1, $num2) {
                return $num1 * $num2;
            }, $matches[1], $matches[2]),
            fn ($num1, $num2) => $num1 + $num2
        );
    }

    private static function multiplyAll(array $multipliers1, array $multipliers2): int {
        $sum = 0;

        for($i = 0; $i < count($multipliers1); $i++) {
            $sum += $multipliers1[$i] * $multipliers2[$i];
        }

        return $sum;
    }
}