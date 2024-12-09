<?php

namespace Advent\Day09;

require __DIR__ . '/../../vendor/autoload.php';

use DevDojo\Day09\Support\DiskDefragmenter;
use DevDojo\Day09\Support\DiskMapExpansor;
use PHPUnit\Event\Runtime\PHP;

if ($argc != 2) {
    echo "Usage: php $argv[0] 12345\n";
    exit(1);
}

$input = $argv[1];

echo "Expanding:\n";

$expansor = new DiskMapExpansor();
$defragger = new DiskDefragmenter();

$diskMap = $expansor->expanse($input);
echo json_encode($diskMap) . PHP_EOL;
$defragger->defrag($diskMap, true);

// echo "$diskMap\n\n";


