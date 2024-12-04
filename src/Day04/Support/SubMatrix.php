<?php

namespace DevDojo\Day04\Support;

readonly class SubMatrix
{
    public int $size;

    public function __construct(public array $matrix)
    {
        $this->size = strlen($matrix[0]);
    }

    public function equalsTo(SubMatrix $matrix): bool
    {
        return $this->matrix == $matrix->matrix;
    }

    public function rotate(): SubMatrix
    {
        $newMatrix = [];

        for ($y = 0; $y < $this->size; $y++) {
            for ($x = 0; $x < $this->size; $x++) {
                $newY = $x;
                $newX = $this->size - $y - 1;

                $newMatrix[$newY][$newX] = $this->matrix[$y][$x];
            }
        }


        $map = static function(array $line) {
            ksort($line);
            return implode('', $line);
        };

        $normalizedMatrix = array_map($map, $newMatrix);

        return new SubMatrix($normalizedMatrix);
    }

//    public function mirror(): SubMatrix
//    {
//        $newMatrix = [];
//
//        for ($y = 0; $y < $this->size; $y++) {
//            for ($x = 0; $x < $this->size; $x++) {
//                $newMatrix[$this->size - $y][$x] = $this->matrix[$y][$x];
//            }
//        }
//
//        $map = static fn(array $line) => implode('', $line);
//        $normalizedMatrix = array_map($map, $newMatrix);
//
//        return new SubMatrix($normalizedMatrix);
//    }

    public function debug(): SubMatrix
    {
        print_r($this->matrix);

        return $this;
    }

    public function normalize(): SubMatrix
    {
        $newMatrix = $this->matrix;

        $newMatrix[0][1] = '.';
        $newMatrix[1][0] = '.';
        $newMatrix[1][2] = '.';
        $newMatrix[2][1] = '.';

        return new SubMatrix($newMatrix);
    }

    public function __toString(): string
    {
        return implode('', $this->matrix);
    }
}

/*
M.M   S.M   S.S   M.S
.A.   .A.   .A.   .A.
S.S   S.M   M.M   M.S
*/