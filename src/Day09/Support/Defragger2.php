<?php

namespace DevDojo\Day09\Support;

use function PHPUnit\Framework\assertSame;

class Defragger2
{
    /**
     * @param array<MemoryBlock> $input
     * @return void
     */
    public function defrag(array &$input): void
    {
        for ($j = count($input) - 1; $j >= 0; $j--) {
            $blockToMove = $input[$j];

            if ($blockToMove->isFree) continue; // can't move free space

            $i = $this->getFirstFreeSpace($input, $blockToMove);

            if ($i === null) continue; // there no enough space

            $this->swap($input, $i, $j);
        }
    }

    /**
     * @param array<MemoryBlock> $input
     * @param int $currentIndex
     * @return int
     */
    private function getLastBlockIndex(array &$input, int $currentIndex): int
    {
        for ($i = $currentIndex; $i >= 0; $i--) {
            if ($input[$i]->isFree) continue;

            return $i;
        }

        return 0;
    }

    /**
     * @param array<MemoryBlock> $input
     * @param int $i
     * @param int $j
     * @return void
     */
    private function swap(array &$input, int $i, int $j): void
    {
        $freeSpace = $input[$i];
        $blockToMove = $input[$j];

        array_splice($input, $j, 0, $blockToMove->free());
        array_splice($input, $i, 0, $freeSpace->alloc($blockToMove));
    }

    /**
     * @param array<MemoryBlock> $input
     * @param MemoryBlock $blockToFit
     * @return int|null
     */
    private function getFirstFreeSpace(array &$input, MemoryBlock $blockToFit): int|null
    {
        for ($i = 0; $i < count($input); $i++) {
            $block = $input[$i];

            if ($block->fit($blockToFit)) {
                return $i;
            }
        }

        return null;
    }
}