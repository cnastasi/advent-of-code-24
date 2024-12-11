<?php

namespace DevDojo\Day10\Support;

readonly class Coordinates
{
    public function __construct(
        public int $x,
        public int $y
    )
    {
        //
    }

    public function __toString(): string
    {
        return "[{$this->x},{$this->y}]";
    }

    public function moveTo(Direction $direction): Coordinates {
        return match ($direction) {
            Direction::NORTH => new Coordinates($this->x, $this->y - 1),
            Direction::SOUTH => new Coordinates($this->x, $this->y + 1),
            Direction::WEST => new Coordinates($this->x - 1, $this->y),
            Direction::EAST => new Coordinates($this->x + 1, $this->y),
        };
    }
}