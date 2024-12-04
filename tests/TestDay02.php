<?php
namespace DevDojo;

use DevDojo\Day02\Support\Either;
use DevDojo\Day02\Support\Left;
use DevDojo\Day02\Support\LevelDampener;
use DevDojo\Day02\Support\Right;
use DevDojo\Day02\Support\SafeChecker;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\DataProvider;

class TestDay02 extends \PHPUnit\Framework\TestCase
{
    private SafeChecker $checker;
    private LevelDampener $dampener;

    public static function dataProvider1(): \Generator
    {
        yield [[7, 6, 4, 2, 1], new Right()];
        yield [[1, 2, 7, 8, 9], new Left(2)];
        yield [[9, 7, 6, 2, 1], new Left(3)];
        yield [[1, 3, 2, 4, 5], new Left(2)];
        yield [[8, 6, 4, 4, 1], new Left(3)];
        yield [[1, 3, 6, 7, 9], new Right()];
    }

    public static function dataProvider2(): \Generator
    {
        yield [[7, 6, 4, 2, 1], new Right()];
        yield [[1, 2, 7, 8, 9], new Left(2)];
        yield [[9, 7, 6, 2, 1], new Left(3)];
        yield [[1, 3, 2, 4, 5], new Right()];
        yield [[8, 6, 4, 4, 1], new Right()];
        yield [[1, 3, 6, 7, 9], new Right()];
        yield [[44, 44, 47, 50, 53, 55, 57, 60], new Right()];
        yield [[76, 76, 79, 82, 86, 86], new Left(3)];

    }

    public function setUp(): void
    {
        parent::setUp();

        $this->checker = new SafeChecker();
        $this->dampener = new LevelDampener();
    }

    #[DataProvider("dataProvider1")]
    public function test1(array $levels, Either $expected)
    {
        $result = $this->checker->isSafe($levels);

        Assert::assertEquals($expected, $result);
    }

    #[DataProvider("dataProvider2")]
    public function test2(array $levels, Either $expected)
    {
        $result = $this->checker->isSafe($levels);

        if ($result->isLeft()) {
            $newLevels = $this->dampener->dump($levels, $result->value);

            $result = $this->checker->isSafe($newLevels);
        }

        Assert::assertEquals($expected, $result);
    }
}