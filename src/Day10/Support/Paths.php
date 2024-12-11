<?php

namespace DevDojo\Day10\Support;

class Paths
{
    private array $paths = [];

    public int $count {
        get {
            return count($this->paths);
        }
    }

    public function addPath(Path $path): void
    {
        $this->paths[] = $path;
    }
}