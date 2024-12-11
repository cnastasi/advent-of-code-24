<?php

namespace DevDojo\Day10\Support;

class Tails
{
    private array $tails = [];

    public int $count {
        get {
            return count($this->tails);
        }
    }

    public function addTail(Coordinates $coordinate): void
    {
        $this->tails[(string)$coordinate] = true;
    }
}