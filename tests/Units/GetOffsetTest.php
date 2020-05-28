<?php

namespace Lloricode\Timezone\Test\Units;

use Lloricode\Timezone\Test\TestCase;
use Lloricode\Timezone\Timezone;

class GetOffsetTest extends TestCase
{
    /** @test */
    public function get_offset()
    {
        $this->assertEquals('(UTC+08:00) Asia/Manila', Timezone::getOffset('Asia/Manila'));
    }
}