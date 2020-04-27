<?php

namespace Lloricode\Timezone\Test\Units;

use InvalidArgumentException;
use Lloricode\Timezone\Test\TestCase;
use Lloricode\Timezone\Timezone;

class HandleExceptionTest extends TestCase
{

    /** @test */
    public function empty_arguments()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Empty array argument not allowed.');

        Timezone::generateList([]);
    }

    /** @test */
    public function invalid_arguments()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('DateTimeZone::11111111111111 not found.');

        Timezone::generateList([11111111111111]);
    }
}