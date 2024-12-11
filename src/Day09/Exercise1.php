<?php

namespace DevDojo\Day09;

use DevDojo\Day09\Support\ChecksumCalculator;
use DevDojo\Day09\Support\Defragger;
use DevDojo\Day09\Support\Expander;

class Exercise1
{
    public static function execute(string &$input): int
    {
        $expander = new Expander();
        $defragger = new Defragger();
        $checksumCalculator = new ChecksumCalculator();

        $memoryMap = $expander->expand($input);

        $defragger->defrag($memoryMap);

        return $checksumCalculator->calculate($memoryMap);
    }
}