<?php

namespace DevDojo\Day09\Support;

class Defragger
{
    public function defrag(array &$input): void
    {
        $j = $this->getLastBlockIndex($input, count($input) - 1);

        for($i = 0; $i <= $j; $i++) {
            if ($input[$i] === '.') {
                $input[$i] = $input[$j];
                $input[$j] = '.';
                $j = $this->getLastBlockIndex($input, $j - 1);
            }
        }
    }

    private function getLastBlockIndex(array &$input, int $currentIndex): int
    {
        for($i = $currentIndex; $i >= 0; $i--) {
            if ($input[$i] === '.') continue;

            return $i;
        }

        return 0;
    }
}