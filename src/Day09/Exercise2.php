<?php

namespace DevDojo\Day09;

use DevDojo\Day09\Support\ChecksumCalculator;
use DevDojo\Day09\Support\Defragger;
use DevDojo\Day09\Support\Defragger2;
use DevDojo\Day09\Support\Expander;
use DevDojo\Day09\Support\Expander2;

class Exercise2
{
    public static function execute(string &$input): int
    {
        $expander = new Expander2();
        $defragger = new Defragger2();
        $checksumCalculator = new ChecksumCalculator();

        $memoryMap = $expander->expand($input);

        $defragger->defrag($memoryMap);

        echo json_encode($memoryMap, JSON_PRETTY_PRINT);

        return $checksumCalculator->calculate($memoryMap);
    }
}