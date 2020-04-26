<?php

namespace Lloricode\Timezone\Test\Units;

use DateTimeZone;
use Lloricode\Timezone\Test\TestCase;
use Lloricode\Timezone\Timezone;

class TimezoneTest extends TestCase
{

    /** @test */
    public function get_list_array()
    {
        $this->assertContains('(UTC+08:00) Asia/Manila', Timezone::generateList());
        $this->assertContains('(UTC+08:00) Asia/Manila', Timezone::generateList([DateTimeZone::ASIA]));
    }

    /** @test */
    public function different_arg()
    {
        $this->assertCount(426, Timezone::generateList());
        $this->assertCount(83, Timezone::generateList([DateTimeZone::ASIA]));
    }
}