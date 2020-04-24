<?php

namespace Lloricode\Timezone\Test\Units;

use Lloricode\Timezone\Test\TestCase;
use Lloricode\Timezone\Timezone;

class TimezoneTest extends TestCase
{

    /** @test */
    public function get_list_array()
    {
        $this->assertContains('(UTC+08:00) Asia/Manila', Timezone::generateList());
    }
}