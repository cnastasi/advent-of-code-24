<?php

namespace DevDojo;

use DevDojo\Day10\Exercise1;
use DevDojo\Day10\Exercise2;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TestDay10 extends TestCase
{
    public static function dataProvider(): \Generator
    {
        yield [<<<TEXT
               ...0...
               ...1...
               ...2...
               6543456
               7.....7
               8.....8
               9.....9 
               TEXT, 2];

        yield [<<<TEXT
                ..90..9
                ...1.98
                ...2..7
                6543456
                765.987
                876....
                987....
                TEXT, 4];

        yield [<<<TEXT
                10..9..
                2...8..
                3...7..
                4567654
                ...8..3
                ...9..2
                .....01
                TEXT, 3];
        yield [<<<TEXT
                89010123
                78121874
                87430965
                96549874
                45678903
                32019012
                01329801
                10456732
                TEXT, 36];

        yield [file_get_contents(__DIR__ . '/../assets/input_day_10.txt'), 698];
    }

    #[DataProvider('dataProvider')]
    public function test(string $input, int $expected): void
    {
        $result = Exercise1::execute($input);

        Assert::assertSame($expected, $result);
    }

    #[DataProvider('dataProvider2')]
    public function test2(string $input, int $expected): void
    {
        $result = Exercise2::execute($input);

        Assert::assertSame($expected, $result);
    }

    public static function dataProvider2(): \Generator
    {
        yield [<<<TEXT
                .....0.
                ..4321.
                ..5..2.
                ..6543.
                ..7..4.
                ..8765.
                ..9....
                TEXT, 3];

        yield [<<<TEXT
                ..90..9
                ...1.98
                ...2..7
                6543456
                765.987
                876....
                987....
                TEXT, 13];

        yield [<<<TEXT
                012345
                123456
                234567
                345678
                4.6789
                56789.
                TEXT, 227];
        yield [<<<TEXT
                89010123
                78121874
                87430965
                96549874
                45678903
                32019012
                01329801
                10456732
                TEXT, 81];

      yield [file_get_contents(__DIR__ . '/../assets/input_day_10.txt'), 698];
    }


}