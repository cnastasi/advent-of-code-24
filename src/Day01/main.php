<?php

namespace DevDojo;

function readFile(string $filename): array
{
    $column1 = [];
    $column2 = [];

    $handle = fopen($filename, "r");

    while (!feof($handle)) {
        $line = fgets($handle, 4096);

        if (!$line)
            break;

        $trunks = explode("   ", $line);

        $column1[] = (int)trim($trunks[0]);

        $key = (int)trim($trunks[1]);
        $column2["$key"] = isset($column2["$key"]) ? $column2["$key"] + 1 : 1;
    }

    fclose($handle);

    return [&$column1, &$column2];
}

[$column1, $column2] = readFile(__DIR__ . '/../assets/input_old.txt');

//sort($column1);

$score = 0;

foreach($column1 as $item) {
    $score +=  ($column2["$item"] ?? 0) * $item;
}

echo "La tua distanza è: {$score}\n";
// read file
// sort file
// sum elements