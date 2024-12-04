<?php

declare(strict_types=1);

namespace DevDojo\Day02;

use DevDojo\Day02\Support\InputReader;
use DevDojo\Day02\Support\LevelDampener;
use DevDojo\Day02\Support\SafeChecker;

require __DIR__ . '/../../vendor/autoload.php';

$reader = new InputReader();
$checker = new SafeChecker();
$dampener = new LevelDampener();

$counter = 0;

$currentLine = 1;

foreach ($reader() as $line) {
    $levels = array_map(intval(...), explode(" ", $line));

    $result = $checker->isSafe($levels);

    if ($result->isRight()) {
        $counter++;
    } else {
        if ($result->value) {
            $newLevels = $dampener->dump($levels, $result->value);
            $result = $checker->isSafe($newLevels);

            if ($result->isRight()) {
                $counter++;
            }
        }
        else {
            echo $currentLine . "\n";
        }
    }

    $currentLine++;
}

echo "The counter is $counter\n";