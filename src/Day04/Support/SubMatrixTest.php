<?php

namespace DevDojo\Day04\Support;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class SubMatrixTest extends TestCase
{
    #[\PHPUnit\Framework\Attributes\Test]
    public function should_rotate_one_time(): void
    {
        $matrix = new SubMatrix(['123', '456', '789']);
        $expected = new SubMatrix(['741', '852', '963']);

        Assert::assertEquals($expected, $matrix->rotate());
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function should_rotate_twice(): void {
        $matrix = new SubMatrix(['123', '456', '789']);
        $expected = new SubMatrix(['987', '654', '321']);

        Assert::assertEquals($expected, $matrix->rotate()->rotate());
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function should_rotate_three_times(): void {
        $matrix = new SubMatrix(['123', '456', '789']);
        $expected = new SubMatrix(['369', '258', '147']);

        Assert::assertEquals($expected, $matrix->rotate()->rotate()->rotate());
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function should_normalize(): void
    {
        $matrix = new SubMatrix(['123', '456', '789']);
        $expected = new SubMatrix(['1.3', '.5.', '7.9']);

        Assert::assertEquals($expected, $matrix->normalize());
    }
}
