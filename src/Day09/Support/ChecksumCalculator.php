<?php

namespace DevDojo\Day09\Support;

class ChecksumCalculator
{
    public function calculate(array &$input): int
    {
        $checksum = 0;
        foreach ($input as $index => $char) {
            if ($char === '.') {
                break;
            }

            $checksum +=  $index * (int)$char;
        }

        return $checksum;
    }
}