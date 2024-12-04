<?php

namespace DevDojo;

use DevDojo\Day03\Exercise01;
use DevDojo\Day03\Exercise02;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TestDay03 extends TestCase
{
    public static function dataProvider1(): \Generator
    {
        yield ["xmul(1,2)", 2];
        yield ["xmul(2,4)%&mul[3,7]!@^do_not_mul(5,5)+mul(32,64]then(mul(11,8)mul(8,5))", 161];
        yield [file_get_contents(__DIR__ . '/input_day_03.txt'), 0];
    }

    public static function dataProvider2(): \Generator
    {
        yield ["xmul(1,2)", 2];
        yield ["do() xmul(3,2)", 6];
        yield ["don't() xmul(1,2) do() xmul(1,3)", 3];
        yield ["do() xmul(2,5) don't() xmul(1,2)", 10];
        yield [file_get_contents(__DIR__ . '/../assets/input_day_03.txt') . ' do()', 0];
    }

    #[DataProvider("dataProvider1")]
    public function test1(string $input, int $expected)
    {
        $result = Exercise01::execute($input);

        Assert::assertSame($expected, $result);
    }

    #[DataProvider("dataProvider2")]
    public function test2(string $input, int $expected)
    {
        $result = Exercise02::execute($input);

        Assert::assertSame($expected, $result);
    }
    #[DataProvider("dataProvider2")]
    public function testGallea(string $input, int $expected)
    {
        $result = Exercise02::galleaSolution($input);

        Assert::assertSame($expected, $result);
    }


}