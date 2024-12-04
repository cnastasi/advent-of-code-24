<?php

namespace DevDojo\Day02\Support;

readonly class Right extends Either
{
    public function isLeft(): bool
    {
        return false;
    }

    public function isRight(): bool
    {
        return true;
    }
}