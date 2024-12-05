<?php

namespace DevDojo\Day05;

use DevDojo\Day05\Support\RuleEngine;

class Exercise02
{
    public static function execute(array $rules, array $paths): int
    {
        $ruleEngine = new RuleEngine();

        foreach ($rules as $rule) {
            $ruleEngine->addRule($rule);
        }

        $uncorrectPaths = [];

        foreach ($paths as $path) {
            if (!$ruleEngine->hasPath($path)) {
                $uncorrectPaths[] = $path;
            }
        }

        $correctPaths = [];

        foreach ($uncorrectPaths as $path) {
            $correctPaths[] = $ruleEngine->orderByScore($path);
        }

        $result = 0;

        foreach ($correctPaths as $path) {
            $middleNumber = static::findMiddleNumber($path);

            $result += $middleNumber;
        }

        return $result;
    }

    private static function findMiddleNumber(array $path): int
    {
        $index = floor(count($path) / 2);

        return intval($path[$index]);
    }
}