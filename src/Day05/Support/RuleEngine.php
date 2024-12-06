<?php

namespace DevDojo\Day05\Support;

class RuleEngine
{
    private array $nodes;

    public function addRule(string $rule)
    {
        [$firstNumber, $secondNumber] = explode('|', $rule);

        $this->attachNode($firstNumber, $secondNumber);
    }

    private function getNode(string $value): Node
    {
        if (!$this->hasNode($value)) {
            $this->nodes[$value] = new Node($value);
        }

        return $this->nodes[$value];
    }

    public function findNode(string $value): ?Node
    {
        return $this->nodes[$value] ?? null;
    }

    private function attachNode(string $parent, string $value): void
    {
        $parentNode = $this->getNode($parent);
        $node = $this->getNode($value);

        $parentNode->addChild($node);
    }

    public function hasNode(string $value): bool
    {
        return isset($this->nodes[$value]);
    }

    public function hasPath(array $path): bool
    {
        $first = array_shift($path);

        $node = $this->findNode($first);
        return $node?->hasPath($path) ?? false;
    }

    public function orderByScore(array $path): array
    {
        $orderedPath = [];

//        echo "Path: " . implode(',', $path) . "\n";
//        echo "Memory used: " . memory_get_usage(true) / 1024 / 1024 . "\n";


        foreach ($path as $value) {
            $node = $this->findNode($value);

            $uuid = (string)rand(1, 4096);
//            echo "Find score for: " . $value . "\n";

            $score = $node?->getScore($uuid) ?? 0;

            $orderedPath[$value] = $score;

            //echo "-----------------\n";
        }

        asort($orderedPath);

        return array_reverse(array_keys($orderedPath));

    }
}