<?php

namespace DevDojo;

use DevDojo\Day05\Support\Node;
use DevDojo\Day05\Support\RuleEngine;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class TestDay05A extends TestCase
{
    public function testNodeCreation(): void
    {
        $engine = new RuleEngine();

        $engine->addRule('1|2');

        $rootNode = $engine->findNode(1);

        $expected = new Node(1);
        $expected->addChild(new Node(2));

        Assert::assertEquals($expected, $rootNode);
    }

    public function testHasPath(): void
    {
        $engine = new RuleEngine();

        $engine->addRule('1|2');

        Assert::assertEquals(true, $engine->hasPath(['1', '2']));
    }

    public function testHasPath2(): void
    {
        $engine = new RuleEngine();

        $engine->addRule('1|2');
        $engine->addRule('1|3');
        $engine->addRule('1|4');
        $engine->addRule('4|3');
        $engine->addRule('4|2');
        $engine->addRule('2|5');
        $engine->addRule('5|6');

        Assert::assertEquals(true, $engine->hasPath(['1', '4', '3', '2', '5', '6']));
    }

    public function testScore(): void
    {
        $engine = new RuleEngine();

        $engine->addRule('1|2');
        $engine->addRule('1|3');
        $engine->addRule('2|4');

        $node1 = $engine->findNode(1);
        $node2 = $engine->findNode(2);
        $node3 = $engine->findNode(3);
        $node4 = $engine->findNode(4);

        Assert::assertSame(4, $node1->getScore());
        Assert::assertSame(2, $node2->getScore());
        Assert::assertSame(1, $node3->getScore());
        Assert::assertSame(1, $node4->getScore());
    }
}