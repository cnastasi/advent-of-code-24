<?php

namespace DevDojo\Day06\Support;

class Coordinates
{
    public function __construct(
        public int $x,
        public int $y
    )
    {
    }

    public function moveTo(Direction $direction): Coordinates {
        return match ($direction) {
            Direction::LEFT => new Coordinates($this->x - 1, $this->y),
            Direction::RIGHT => new Coordinates($this->x + 1, $this->y),
            Direction::UP => new Coordinates($this->x, $this->y - 1),
            Direction::DOWN => new Coordinates($this->x, $this->y + 1)
        };
    }

    public function equals(Coordinates $coordinates): bool
    {
        return $this->x === $coordinates->x && $this->y === $coordinates->y;
    }

    public function __toString(): string
    {
        return "{$this->x}_{$this->y}";
    }
}