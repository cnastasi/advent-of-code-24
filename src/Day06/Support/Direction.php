<?php

namespace DevDojo\Day06\Support;

use DevDojo\Day02\Support\Right;

enum Direction: string
{
    case UP = '^';
    case DOWN = 'v';
    case LEFT = '>';
    case RIGHT = '<';

    public function rotate(): Direction
    {
        return match($this) {
            self::UP => self::RIGHT,
            self::DOWN => self::LEFT,
            self::LEFT => self::UP,
            self::RIGHT => self::DOWN,
        };
    }
}