<?php

namespace DevDojo\Day08\Support;

class Segment
{
    public function __construct(
        public Coordinates $a,
        public Coordinates $b
    )
    {
    }

    public float $length {
        get {
            return sqrt(
                pow($this->dx, 2)
                + pow($this->dy, 2)
            );
        }
    }

    public int $dx {
        get {
            return $this->b->x - $this->a->x;
        }
    }

    public int $dy {
        get {
            return $this->b->y - $this->a->y;
        }
    }

    public function forward(): Segment
    {
        return new Segment(
            $this->b,
            $this->b->moveBy($this->dx, $this->dy),
        );
    }

    public function backward(): Segment
    {
        return new Segment(
            $this->a->moveBy(-$this->dx, -$this->dy),
            $this->a
        );
    }

    public function __toString(): string
    {
        return "{$this->a} - {$this->b} ({$this->length})";
    }
}