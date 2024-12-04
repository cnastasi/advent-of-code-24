<?php

namespace DevDojo\Day04\Support;

readonly class Word
{
    public int $length;
    public string $firstLetter;

    public function __construct(public string $value)
    {
        $this->length = strlen($value);
        $this->firstLetter = $this->value[0] ?? '';
    }

    public function removeFirstLetter(): Word
    {
        return new Word(substr($this->value, 1));
    }

    public function isEmpty()
    {
        return $this->length === 0;
    }
}