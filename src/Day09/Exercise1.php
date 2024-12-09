<?php

namespace DevDojo\Day09;

use DevDojo\Day09\Support\ChecksumCalculator;
use DevDojo\Day09\Support\DiskDefragmenter;
use DevDojo\Day09\Support\DiskMapExpansor;

class Exercise1
{
    public static function execute(string $input): int
    {
        $expansor = new DiskMapExpansor();
        $defragger = new DiskDefragmenter();
        $cheksumCalculator = new ChecksumCalculator();

        $diskMap = $expansor->expanse($input);
        $defragger->defrag($diskMap);

        $checksum = $cheksumCalculator->calculate($diskMap);

        return $checksum;
    }
}