<?php

namespace DevDojo\Day09\Support;

class DiskMapExpansor
{

    public function expanse(string $input): array
    {
        $blockId = 0;
        $result = [];
        $isFreeSpace = false;

        for ($i = 0; $i < strlen($input); $i++) {
            $value = (int)$input[$i];

            if ($isFreeSpace) {
                array_push($result, ...array_fill($i, $value, '.'));
            } else {
                array_push($result, ... array_fill($i, $value, $blockId));
                $blockId++;
            }

            $isFreeSpace = !$isFreeSpace;
        }

        return $result;
    }
}