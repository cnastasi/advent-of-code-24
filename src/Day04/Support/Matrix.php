<?php

namespace DevDojo\Day04\Support;

readonly class Matrix
{
    public int $size;
    public array $matrix;

    public function __construct(array $matrix)
    {
        $this->matrix = $matrix;
        $this->size = strlen($matrix[0]);
    }

    public function isOutOfBound(Coordinates $coordinates): bool
    {
        return $coordinates->x >= $this->size
            || $coordinates->x < 0
            || $coordinates->y >= $this->size
            || $coordinates->y < 0;
    }

    public function get(Coordinates $coordinates): string
    {
        return $this->matrix[$coordinates->y][$coordinates->x] ?? '';
    }

    public function points(): \Generator
    {
        for ($y = 0; $y < $this->size; $y++) {
            for ($x = 0; $x < $this->size; $x++) {
                yield new Coordinates($x, $y);
            }
        }
    }

    public function match(Coordinates $coordinates, SubMatrix $m1): bool
    {
        $myMatrix = $this->extract($coordinates)->normalize();
        //$myMatrix->debug();
        //$m1;
        $m2 = $m1->rotate();
        $m3 = $m2->rotate();
        $m4 = $m3->rotate();

        $match = $myMatrix->equalsTo($m1)
            || $myMatrix->equalsTo($m2)
            || $myMatrix->equalsTo($m3)
            || $myMatrix->equalsTo($m4);

        echo "{$m1} | {$m2} | {$m3} | {$m4} => {$myMatrix} [$match]\n";

        return $match;
    }

    public function extract(Coordinates $coordinates): SubMatrix
    {
        $offsetX = $coordinates->x - 1;
        $offsetY = $coordinates->y - 1;

        $subMatrix = [];

        for ($y = $offsetY; $y < $offsetY + 3; $y++) {
            $line = '';

            for ($x = $offsetX; $x < $offsetX + 3; $x++) {
                $line .= $this->matrix[$y][$x] ?? '';
            }

            $subMatrix[] = $line;
        }

        return new SubMatrix($subMatrix);
    }
}