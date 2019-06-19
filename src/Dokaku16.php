<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku16;

class Dokaku16
{
    public function run(string $input) : string
    {
        $map = InputParser::parse($input);
        $map->walkFrom(0, 2);

        return (string)$map;
    }
}
