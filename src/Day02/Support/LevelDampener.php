<?php

namespace DevDojo\Day02\Support;

class LevelDampener
{
    public function dump(array $level, int $i): array {
        unset($level[$i]);

        return array_values($level);
    }
}