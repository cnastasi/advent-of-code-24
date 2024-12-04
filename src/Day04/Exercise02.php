<?php

namespace DevDojo\Day04;

use DevDojo\Day04\Support\Matrix;
use DevDojo\Day04\Support\SubMatrix;

class Exercise02
{
    public static function execute(string $input): int
    {
        $matrix = explode("\n", $input);

        return static::findSubMatrix(new Matrix($matrix), new SubMatrix(['M.S', '.A.', 'M.S']));
    }

    /**
     * @param array<string> $matrix
     * @return int
     */
    public static function findSubMatrix(Matrix $matrix, SubMatrix $subMatrix): int
    {
        $result = 0;

        foreach ($matrix->points() as $coordinates) {
            if ($matrix->get($coordinates) === 'A') {
                //$result += $matrix->match($coordinates, $subMatrix) ? 1 : 0;
                $match = $matrix->match($coordinates, $subMatrix);

                if ($match) {
                    $result += 1;
                }
            }
        }

        return $result;
    }
}