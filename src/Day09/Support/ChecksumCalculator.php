<?php

namespace DevDojo\Day09\Support;

class ChecksumCalculator
{

    public function calculate(array $memoryMap): int
    {
        $sum = 0;

        foreach($memoryMap as $index => $blockId) {
            if ($blockId === '.') break;

            $sum += $blockId * $index;
        }

        return $sum;
    }
}