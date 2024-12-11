<?php

namespace DevDojo\Day09\Support;

class Expander
{
    public function expand(string $input): array
    {
        $isFreeMemory = false;
        $result = [];
        $blockId = 0;

        for ($i = 0; $i < strlen($input); $i++) {
            $value = (int)$input[$i];

            if ($isFreeMemory) {
                array_push($result, ...array_fill(0, $value, '.'));
            }
            else {
                array_push($result, ...array_fill(0, $value, $blockId));
                $blockId++;
            }

            $isFreeMemory = !$isFreeMemory;
        }

        return $result;
    }
}