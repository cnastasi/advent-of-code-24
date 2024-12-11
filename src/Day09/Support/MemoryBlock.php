<?php

namespace DevDojo\Day09\Support;

readonly class MemoryBlock
{
    public bool $isFree;

    public function __construct(
        public int  $size,
        public ?int $id = null,
    )
    {
        $this->isFree = $id === null;
    }

    public function fit(MemoryBlock $block): bool
    {
        return $this->isFree && $this->size >= $block->size;
    }

    /**
     * @param MemoryBlock $block
     * @return array<MemoryBlock>
     */
    public function alloc(MemoryBlock $block): array
    {
        assert($this->isFree, 'Can\'t alloc memory already allocated');
        assert($this->size >= $block->size, 'Memory block is too small');

        $remainingFreeSpace = $this->size - $block->size;

        return $remainingFreeSpace > 0 ? [$block, new MemoryBlock($remainingFreeSpace)] : [$block];
    }

    public function free(): MemoryBlock
    {
        assert(!$this->isFree, 'Can\'t free memory already freed');

        return new MemoryBlock($this->size);
    }

    public function fitSize(int $size): bool
    {
        return $this->isFree && $this->size >= $size;
    }
}