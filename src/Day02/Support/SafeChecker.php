<?php

namespace DevDojo\Day02\Support;



class SafeChecker
{
    public function isSafe(array $levels): Either
    {
        return match (true) {
            $levels[0] > $levels[1] => $this->isSafeDescendent($levels),
            $levels[0] < $levels[1] => $this->isSafeAscendent($levels),
            $levels[0] === $levels[1] => new Left(1),
        };
    }

    protected function isSafeDescendent(array $levels): Either
    {
        $previous = $levels[0];

        for ($i = 1; $i < count($levels); $i++) {
            $current = $levels[$i];
            //echo "{$previous} -> {$current}\n";
            if ($previous <= $current || $current < $previous - 3) {
                return new Left($i);
            }

            $previous = $current;
        }

        return new Right();
    }

    protected function isSafeAscendent(array $levels): Either
    {
        $previous = $levels[0];

        for ($i = 1; $i < count($levels); $i++) {
            $current = $levels[$i];

            if ($previous >= $current || $current > $previous + 3) {
                return new Left($i);
            }

            $previous = $current;
        }

        return new Right();
    }
}