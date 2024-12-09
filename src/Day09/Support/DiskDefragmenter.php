<?php

namespace DevDojo\Day09\Support;

class DiskDefragmenter
{
    public function defrag(array &$input, bool $debug = false): void
    {
        echo "Pippo\n\n";
        if ($debug) {
            echo "Defragging\n\n";
        }

        if($debug) {
            $this->print($input, null, null);
            $this->cursorBack();
        }


        for ($i = 0, $j = $this->getNextBlockIndex($input, count($input) - 1); $i <= $j; $i++) {
            if ($input[$i] == '.') {
                $input[$i] = $input[$j];
                $input[$j] = '.';
                $j = $this->getNextBlockIndex($input, $j - 1);
            }

            if ($debug) {
                $this->print($input, $i, $j);
                usleep(100000);
                $this->cursorBack();
            }
        }

        if ($debug) {
            $this->print($input,null, null);
            echo "\n";
        }
    }

    private function print(array &$input, ?int $i, ?int $j): void
    {
        echo implode('', $input) . "\n";

        if ($i != null) {
            $offsetI  = str_repeat(' ', $i);
            $offsetJ  = str_repeat(' ', max($j - $i - 1, 0));
            $endSpace = str_repeat(' ', count($input) - $j);

            echo "{$offsetI}^{$offsetJ}^{$endSpace}\n";
        }
        else {
            echo str_repeat(' ', count($input));
        }
    }

    private function cursorBack(): void {
        echo chr(27) . "[0G";
        echo chr(27) . "[2A";
    }

    private function getNextBlockIndex(array &$input, int $currentIndex): int
    {
        for ($i = $currentIndex; $i >= 0; $i--) {
            if ($input[$i] == '.') continue;

            return $i;
        }

        return 0;
    }
}