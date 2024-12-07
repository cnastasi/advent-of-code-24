<?php

namespace DevDojo;

use DevDojo\Day07\Exercise1;
use DevDojo\Day07\Exercise2;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TestDay07 extends TestCase
{
    public static function dataProvider(): \Generator
    {
        yield [190, [10, 19], true];
        yield [3267, [81, 40, 27], true];
        yield [83, [17, 5], false];
        yield [156, [15, 6], false];
        yield [7290, [6, 8, 6, 15], false];
        yield [161011, [16, 10, 13], false];
        yield [192, [17, 8, 14], false];
        yield [21037, [9, 7, 18, 13], false];
        yield [292, [11, 6, 16, 20], true];
    }

    #[DataProvider('dataProvider')]
    public function test(int $solution, array $numbers, $expected): void
    {
        $result = Exercise1::execute($solution, $numbers);

        Assert::assertSame($expected, $result);
    }

    public function testReal(): void
    {
        $rawInput = file(__DIR__ . '/../assets/input_day_07.txt');

        $sum = 0;

        foreach ($rawInput as $line) {
            [$solution, $rawNumbers] = explode(': ', $line);

            $solution = (int)$solution;

            $numbers = array_map(
                static fn(string $number): int => (int)$number,
                explode(' ', $rawNumbers)
            );

            $result = Exercise1::execute($solution, $numbers);

            if ($result) {
                $sum += $solution;
            }
        }

        Assert::assertSame(1430271835320, $sum);
    }

    public function test2()
    {
        $input = [
            "190: 10 19",
            "3267: 81 40 27",
            "83: 17 5",
            "156: 15 6",
            "7290: 6 8 6 15",
            "161011: 16 10 13",
            "192: 17 8 14",
            "21037: 9 7 18 13",
            "292: 11 6 16 20",
        ];

        $expected = 11387;

        $result = Exercise2::execute($input);

        Assert::assertSame($expected, $result);
    }

    public function testReal2()
    {
        $rawInput = file(__DIR__ . '/../assets/input_day_07.txt');

        $result = Exercise2::execute($rawInput);

        Assert::assertSame(456565678667482, $result);
    }
}