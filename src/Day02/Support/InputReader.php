<?php

namespace DevDojo\Day02\Support;

class InputReader
{
    public function __invoke(): \Generator
    {
        $handle = fopen(__DIR__ . "/../assets/input_day_02.txt", "r");

        while (($line = fgets($handle)) !== false) {
            yield $line;
        }

        fclose($handle);
    }
}