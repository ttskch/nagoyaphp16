<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku16;

class InputParser
{
    public static function parse(string $input) : Map
    {
        $map = new Map();

        foreach (explode('/', $input) as $i => $rowString) {
            foreach (str_split($rowString) as $j => $cell) {
                $map->setCell($i, $j, intval($cell));
            }
        }

        return $map;
    }
}
