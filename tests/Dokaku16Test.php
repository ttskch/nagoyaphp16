<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku16;

use PHPUnit\Framework\TestCase;

class Dokaku16Test extends TestCase
{
    /**
     * @var Dokaku16
     */
    protected $dokaku16;

    protected function setUp() : void
    {
        $this->dokaku16 = new Dokaku16;
    }

    public function testIsInstanceOfDokaku16() : void
    {
        $actual = $this->dokaku16;
        $this->assertInstanceOf(Dokaku16::class, $actual);
    }
}
