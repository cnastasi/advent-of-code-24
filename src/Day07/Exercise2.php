<?php

namespace DevDojo\Day07;

class Exercise2
{
    public static function execute(array $input): int
    {
        $sum = 0;

        foreach ($input as $line) {
            [$solution, $values] = self::normalizeInput($line);

            $result = static::checkSolution($solution, $values);

            if ($result) {
                $sum += $solution;
            }
        }

        return $sum;

    }

    public static function checkSolution(int $solution, array $input, int $partialResult = null): bool
    {
        if (count($input) === 0) {
            return ($solution === $partialResult);
        }

        if ($partialResult > $solution) {
            return false;
        }

        $firstElement = array_shift($input);
        $rightResult = false;
        $midResult = false;

        $leftResult = static::checkSolution($solution, $input, ($partialResult ?? 1) * $firstElement);

        if (!$leftResult) {
            $rightResult = static::checkSolution($solution, $input, ($partialResult ?? 0) + $firstElement);
        }

        if (!$rightResult) {
            $midResult = static::checkSolution($solution, $input, ($partialResult ?? '') . $firstElement);
        }

        return $leftResult || $rightResult || $midResult;
    }

    /**
     * @param string $line
     * @return array<{int, array}>
     */
    public static function normalizeInput(string $line): array
    {
        [$solution, $rawNumbers] = explode(': ', $line);

        $solution = (int)$solution;

        $numbers = array_map(
            static fn(string $number): int => (int)$number,
            explode(' ', $rawNumbers)
        );

        return [$solution, $numbers];
    }
}