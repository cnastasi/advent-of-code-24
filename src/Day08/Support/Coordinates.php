<?php

namespace DevDojo\Day08\Support;

readonly class Coordinates
{
    public function __construct(
        public int $x,
        public int $y
    )
    {
        //
    }

    public function moveBy(int $dx, int $dy): Coordinates
    {
        return new Coordinates($this->x + $dx, $this->y + $dy);
    }

    public function __toString(): string
    {
        return "[{$this->x},{$this->y}]";
    }
}