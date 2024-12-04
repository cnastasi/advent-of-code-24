<?php

namespace DevDojo\Day04\Support;

readonly class Coordinates
{
    public function __construct(
        public int $x,
        public int $y
    )
    {
    }

    public function moveE(): Coordinates
    {
        return new Coordinates($this->x + 1, $this->y);
    }

    public function moveS(): Coordinates
    {
        return new Coordinates($this->x, $this->y + 1);
    }

    public function moveSE(): Coordinates
    {
        return new Coordinates($this->x + 1, $this->y + 1);
    }

    public function moveW(): Coordinates
    {
        return new Coordinates($this->x - 1, $this->y);
    }

    public function moveN(): Coordinates
    {
        return new Coordinates($this->x, $this->y - 1);
    }

    public function moveNW(): Coordinates
    {
        return new Coordinates($this->x - 1, $this->y - 1);
    }

    public function moveSW(): Coordinates
    {
        return new Coordinates($this->x - 1, $this->y + 1);
    }

    public function moveNE(): Coordinates
    {
        return new Coordinates($this->x + 1, $this->y - 1);
    }

    public function moveTo(Direction $direction): Coordinates
    {
        return match ($direction) {
            Direction::N => $this->moveN(),
            Direction::S => $this->moveS(),
            Direction::W => $this->moveW(),
            Direction::E => $this->moveE(),
            Direction::NW => $this->moveNW(),
            Direction::NE => $this->moveNE(),
            Direction::SW => $this->moveSW(),
            Direction::SE => $this->moveSE(),
        };
    }
}