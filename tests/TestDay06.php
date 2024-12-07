<?php

namespace DevDojo;


use DevDojo\Day06\Support\Coordinates;
use DevDojo\Day06\Support\Map;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class TestDay06 extends TestCase
{
    #[Test]
    public function should_find_starting_point()
    {
        $input = <<<EOT
                    ...
                    .^.
                    ...
                    EOT;


        $map = Map::fromString($input);

        Assert::assertEquals(new Coordinates(1, 1), $map->findStartingPoint());
    }

    public function testExample()
    {
        $input = <<<EOT
                    ....#.....
                    .........#
                    ..........
                    ..#.......
                    .......#..
                    ..........
                    .#..^.....
                    ........#.
                    #.........
                    ......#...
                    EOT;

        $expected = '41';
        $result = (new Day06\Exercise1)->execute($input);

        Assert::assertEquals($expected, $result);
    }

    public function testReal()
    {
        $input = file_get_contents(__DIR__ . '/../assets/input_day_06.txt');

        $expected = '5238';
        $result = (new Day06\Exercise1)->execute($input);

        Assert::assertEquals($expected, $result);
    }

    public function testExample2()
    {
        $input = <<<EOT
                    ....#.....
                    .........#
                    ..........
                    ..#.......
                    .......#..
                    ..........
                    .#..^.....
                    ........#.
                    #.........
                    ......#...
                    EOT;

        $expected = '6';
        $result = (new Day06\Exercise2)->execute($input);

        Assert::assertEquals($expected, $result);
    }

    public function testReal2()
    {
        $input = file_get_contents(__DIR__ . '/../assets/input_day_06.txt');

        $expected = '5238';
        $result = (new Day06\Exercise2)->execute($input);

        Assert::assertEquals($expected, $result);
    }
}