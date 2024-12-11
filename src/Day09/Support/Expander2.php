<?php

namespace DevDojo\Day09\Support;

class Expander2
{
    /**
     * @param string $input
     * @return array<MemoryBlock>
     */
    public function expand(string $input): array
    {
        $isFreeMemory = false;
        $result = [];
        $blockId = 0;

        for ($i = 0; $i < strlen($input); $i++) {
            $value = (int)$input[$i];

            $result[] = ($isFreeMemory)
                ? new MemoryBlock($value)
                : new MemoryBlock($value, $blockId++);

            $isFreeMemory = !$isFreeMemory;
        }

        return $result;
    }
}