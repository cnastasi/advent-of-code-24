<?php

namespace DevDojo;

use DevDojo\Day11\Exercise1;
use DevDojo\Day11\Exercise2;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TestDay11 extends TestCase
{
    public static function dataProvider(): \Generator
    {
        yield ['125 17', 55312];
        yield ['9759 0 256219 60 1175776 113 6 92833', 55312];
    }

    #[DataProvider('dataProvider')]
    public function test(string $input, int $expected): void{
        $result = Exercise1::execute($input);

        $this->assertSame($expected, $result);
    }

    public static function dataProvider2(): \Generator
    {
        yield ['125 17', 55312];
        yield ['9759 0 256219 60 1175776 113 6 92833', 55312];
    }

    #[DataProvider('dataProvider2')]
    public function test2(string $input, int $expected): void{
        $result = Exercise2::execute($input);

        $this->assertSame($expected, $result);
    }
}