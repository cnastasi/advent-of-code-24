<?php

namespace DevDojo\Day04;

use DevDojo\Day04\Support\Coordinates;
use DevDojo\Day04\Support\Direction;
use DevDojo\Day04\Support\Matrix;
use DevDojo\Day04\Support\Word;

class Exercise01
{

    public static function execute(string $input): int
    {
        $matrix = explode("\n", $input);

        return static::findWord(new Matrix($matrix), new Word('XMAS'));
    }

    /**
     * @param array<string> $matrix
     * @return int
     */
    public static function findWord(Matrix $matrix, Word $word): int
    {
        $result = 0;

        foreach ($matrix->points() as $coordinates) {
            if ($matrix->get($coordinates) === $word->firstLetter) {
                foreach (Direction::cases() as $direction) {
                    $result += static::findWordDirectionally($matrix, $coordinates, $word, $direction);
                }

            }
        }

        return $result;
    }

    public static function findWordDirectionally(Matrix $matrix, Coordinates $coordinates, Word $word, Direction $direction): int
    {
        if ($word->isEmpty()) {
            return 1;
        }

        if ($matrix->isOutOfBound($coordinates)) {
            return 0;
        }


        if ($matrix->get($coordinates) === $word->firstLetter) {
            $nextCoordinate = $coordinates->moveTo($direction);
            $shrunkWord = $word->removeFirstLetter();

            return static::findWordDirectionally($matrix, $nextCoordinate, $shrunkWord, $direction);
        }

        return 0;
    }
}