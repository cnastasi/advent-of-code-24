<?php

namespace DevDojo\Day10\Support;

readonly class Path
{
    public array $steps;

    public function __construct(Coordinates ...$steps )
    {
        $this->steps = $steps;
    }
}