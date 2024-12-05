<?php

namespace DevDojo\Day05\Support;

class Node
{
    private string $lastVisit = '';

    /** @var array<Node> */
    private array $children = [];

    public function __construct(public readonly string $value)
    {
    }

    public function addChild(Node $child): void
    {
        $this->children[$child->value] = $child;
    }

    public function hasChild(string $value): bool
    {
        return isset($this->children[$value]);
    }

    public function getChild(string $value): ?Node
    {
        if ($this->hasChild($value)) {
            return $this->children[$value];
        }

        return null;
    }

    public function hasPath(array $path): bool
    {
        if (count($path) === 0) {
            return true;
        }

        $first = array_shift($path);

        $child = $this->getChild($first);

        if ($child) {
            return $child->hasPath($path);
        }

        return false;
    }

    public function getScore(string $uuid): int
    {
        $myScore = 1;

        if ($this->lastVisit !== $uuid) {
         //   echo "Visiting: {$this->value}\n";

            $this->lastVisit = $uuid;

            foreach ($this->children as $child) {
                $myScore += $child->getScore($uuid);
            }
        }
//        else {
//            echo "Visiting: {$this->value} AGAIN!\n";
//        }

        return $myScore;
    }
}