<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku16;

class Map
{
    private $cells = [];
    private $marks = [];

    public function setCell(int $y, int $x, int $value) : void
    {
        $this->cells[$y][$x] = $value;
    }

    public function walkFrom(int $y, int $x) : void
    {
        $this->mark($y, $x);

        // try to go up
        if (isset($this->cells[$y - 1][$x]) && abs($this->cells[$y - 1][$x] - $this->cells[$y][$x]) <= 1 && !$this->isMarked($y - 1, $x)) {
            $this->walkFrom($y - 1, $x);
        }

        // try to go down
        if (isset($this->cells[$y + 1][$x]) && abs($this->cells[$y + 1][$x] - $this->cells[$y][$x]) <= 1 && !$this->isMarked($y + 1, $x)) {
            $this->walkFrom($y + 1, $x);
        }

        // try to go to left
        if (isset($this->cells[$y][$x - 1]) && abs($this->cells[$y][$x - 1] - $this->cells[$y][$x]) <= 1 && !$this->isMarked($y, $x - 1)) {
            $this->walkFrom($y, $x - 1);
        }

        // try to go to right
        if (isset($this->cells[$y][$x + 1]) && abs($this->cells[$y][$x + 1] - $this->cells[$y][$x]) <= 1 && !$this->isMarked($y, $x + 1)) {
            $this->walkFrom($y, $x + 1);
        }
    }

    public function mark(int $y, int $x) : void
    {
        $this->marks[$y][$x] = true;
    }

    public function isMarked(int $y, int $x) : bool
    {
        return isset($this->marks[$y][$x]) && $this->marks[$y][$x];
    }

    public function __toString() : string
    {
        $chunks = [];
        foreach ($this->cells as $y => $row) {

            $chunk = '';
            foreach ($row as $x => $cell) {
                $chunk .= $this->isMarked($y, $x) ? '*' : $this->cells[$y][$x];
            }

            $chunks[] = $chunk;
        }

        return implode('/', $chunks);
    }
}
