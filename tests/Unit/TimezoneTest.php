<?php

declare(strict_types=1);

use Lloricode\Timezone\Timezone;

use function PHPUnit\Framework\assertContains;
use function PHPUnit\Framework\assertCount;

test('get list array', function () {
    assertContains('(UTC+08:00) Asia/Manila', Timezone::generateList());
    assertContains('(UTC+08:00) Asia/Manila', Timezone::generateList(['ASIA']));
});

test('different arg', function () {
    assertCount(419, Timezone::generateList());
    assertCount(83, Timezone::generateList(['ASIA']));
});
