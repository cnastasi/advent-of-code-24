<?php

namespace DevDojo\Day07;

use DevDojo\Day07\Support\Operation;

class Exercise1
{
    public static function execute(int $solution, array $input): bool
    {
        $firstElement = array_shift($input);

        $leftResult = static::checkSolution($solution, $input, $firstElement, Operation::MULTIPLY);
        $rightResult = static::checkSolution($solution, $input, $firstElement, Operation::SUM);

        return $leftResult || $rightResult;
    }

    public static function checkSolution(int $solution, array $input, int $partialResult, Operation $operation): bool
    {
        if (count($input) === 0) {
            return ($solution === $partialResult);
        }

        if ($partialResult > $solution) {
            return false;
        }

        $firstElement = array_shift($input);

        $result = match ($operation) {
            Operation::MULTIPLY => $partialResult * $firstElement,
            Operation::SUM => $partialResult + $firstElement
        };

        $leftResult = static::checkSolution($solution, $input, $result, Operation::MULTIPLY);
        $rightResult = static::checkSolution($solution, $input, $result, Operation::SUM);

        return $leftResult || $rightResult;
    }
}