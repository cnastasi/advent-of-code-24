<?php

namespace DevDojo\Day02\Support;

abstract readonly class Either
{
    public function __construct(public mixed $value = null)
    {
    }

    abstract public function isLeft(): bool;
    abstract public function isRight(): bool;
}