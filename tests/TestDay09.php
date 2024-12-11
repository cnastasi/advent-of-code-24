<?php

namespace DevDojo;

use DevDojo\Day09\Exercise1;
use DevDojo\Day09\Exercise2;
use DevDojo\Day09\Support\Defragger;
use DevDojo\Day09\Support\Expander;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TestDay09 extends TestCase
{
    #[DataProvider('expanderDataProvider')]
    public function testExpander(string $input, string $expected): void
    {
        $expander = new Expander();

        $result = $expander->expand($input);

        $this->assertSame($expected, implode('', $result));
    }

    #[DataProvider('defraggerDataProvider')]
    public function testDefragger(string $input, string $expected): void
    {
        $defragger = new Defragger();

        $splittedInput = str_split($input);

        $defragger->defrag($splittedInput);

        $this->assertSame($expected, implode('', $splittedInput));
    }

    public static function expanderDataProvider(): \Generator
    {
        yield ['12345', '0..111....22222'];
        yield ['1234', '0..111....'];
        yield ['2333133121414131402', '00...111...2...333.44.5555.6666.777.888899'];
    }

    public static function defraggerDataProvider(): \Generator
    {
        yield ['0..111....2222', '02211122......'];
        yield ['00...111...2...333.44.5555.6666.777.888899', '0099811188827773336446555566..............'];
    }

    #[DataProvider('exampleDataProvider')]
    public function testExample(string $input, int $expected): void
    {
        $result = Exercise1::execute($input);

        Assert::assertSame($expected, $result);
    }

    public static function exampleDataProvider(): \Generator
    {
        yield ['12345', 60];
        yield ['2333133121414131402', 1928];
        yield [file_get_contents(__DIR__ . '/../assets/input_day_09.txt'), 6366665108136];
    }

    #[DataProvider('example2DataProvider')]
    public function testExample2(string $input, int $expected): void
    {
        $result = Exercise2::execute($input);

        Assert::assertSame($expected, $result);
    }

    public static function example2DataProvider(): \Generator
    {
        yield ['12345', 60];
        yield ['2333133121414131402', 1928];
        //yield [file_get_contents(__DIR__ . '/../assets/input_day_09.txt'), 6366665108136];
    }
}