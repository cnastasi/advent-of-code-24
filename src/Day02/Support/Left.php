<?php

namespace DevDojo\Day02\Support;

readonly class Left extends Either
{
    public function isLeft(): bool
    {
        return true;
    }

    public function isRight(): bool
    {
        return false;
    }
}