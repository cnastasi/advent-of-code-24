<?php

namespace DevDojo;

use DevDojo\Day04\Exercise01;
use DevDojo\Day04\Exercise02;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[\Attribute] class TestDay04 extends TestCase
{
    public static function dataProvider(): \Generator
    {
        yield 'no xmas' => [
            "......\n" .
            "......\n" .
            "......\n" .
            "......\n" .
            "......\n" .
            "......",
            0];

        yield 'horizontally 1' => [
            ".XMAS.\n" .
            "......\n" .
            "......\n" .
            "..XMAS\n" .
            "......\n" .
            "......",
            2];

        yield 'vertically 1' => [
            "....X.\n" .
            "X...M.\n" .
            "M...A.\n" .
            "A...S.\n" .
            "S.....\n" .
            "......",
            2];

        yield 'vertically 2' => [
            ".X..X.\n" .
            "XMAS.X\n" .
            "M....M\n" .
            "A.S..A\n" .
            "S..S.S\n" .
            ".XMAS.",
            4];

        yield 'diagonally 1' => [
            ".X....\n" .
            "..M...\n" .
            "X..A..\n" .
            ".M..S.\n" .
            "..A...\n" .
            "...S..",
            2];

        yield 'horizontally reversed 1' => [
            "..SAMX\n" .
            "......\n" .
            "XMAS...\n" .
            "......\n" .
            "SAMX..\n" .
            "......",
            3];

        yield 'example' => [
            "MMMSXXMASM\n" .
            "MSAMXMSMSA\n" .
            "AMXSXMAAMM\n" .
            "MSAMASMSMX\n" .
            "XMASAMXAMM\n" .
            "XXAMMXXAMA\n" .
            "SMSMSASXSS\n" .
            "SAXAMASAAA\n" .
            "MAMMMXMMMM\n" .
            "MXMXAXMASX\n", 18];

        yield 'real input' => [file_get_contents(__DIR__ . '/../assets/input_day_04.txt'), 2603];
    }

    public static function dataProvider2()
    {
        yield ["M.S\n.A.\nM.S", 1];

        yield 'example' => [
            "MMMSXXMASM\n" .
            "MSAMXMSMSA\n" .
            "AMXSXMAAMM\n" .
            "MSAMASMSMX\n" .
            "XMASAMXAMM\n" .
            "XXAMMXXAMA\n" .
            "SMSMSASXSS\n" .
            "SAXAMASAAA\n" .
            "MAMMMXMMMM\n" .
            "MXMXAXMASX\n", 9];

        yield 'real input' => [file_get_contents(__DIR__ . '/../assets/input_day_04.txt'), 1966];
    }

    #[DataProvider('dataProvider')]
    public function test(string $matrix, int $expectedCount): void
    {
        $result = Exercise01::execute($matrix);

        Assert::assertSame($expectedCount, $result);
    }

    #[DataProvider('dataProvider2')]
    public function test2(string $matrix, int $expectedCount): void
    {
        $result = Exercise02::execute($matrix);

        Assert::assertSame($expectedCount, $result, "Error");
    }
}