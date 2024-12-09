<?php

namespace DevDojo;

use DevDojo\Day09\Exercise1;
use DevDojo\Day09\Support\DiskDefragmenter;
use DevDojo\Day09\Support\DiskMapExpansor;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TestDay09 extends TestCase
{
    #[DataProvider('diskMapExpansionDataProvider')]
    public function testDiskMapExpansion(string $input, string $expected): void {
        $diskMapExpansor = new DiskMapExpansor();

        $result = $diskMapExpansor->expanse($input);

        Assert::assertSame($expected, $result);
    }

    public static function diskMapExpansionDataProvider(): \Generator {
        yield ['12345', '0..111....22222'];
        yield ['2333133121414131402', '00...111...2...333.44.5555.6666.777.888899'];
    }

    #[DataProvider('diskDefragDataProvider')]
    public function testDefrag(string $input, string $expected): void {
        $defragger = new DiskDefragmenter();

        $result = $defragger->defrag($input);

        Assert::assertSame($expected, $result);
    }

    public static function diskDefragDataProvider(): \Generator {
        yield ['0..111....2222', '02211122......'];
        yield ['00...111...2...333.44.5555.6666.777.888899', '0099811188827773336446555566..............'];
    }

    #[DataProvider('exampleDataProvider')]
    public function testExample(string $input, int $expected): void {
        $result = Exercise1::execute($input);

        Assert::assertSame($expected, $result);
    }

    public static function exampleDataProvider(): \Generator {
        yield ['12345', 60];
        yield ['2333133121414131402', 1928];
        yield [file_get_contents(__DIR__.'/../assets/input_day_09.txt'), 0];
    }
}