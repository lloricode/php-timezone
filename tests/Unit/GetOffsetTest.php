<?php

declare(strict_types=1);

use Lloricode\Timezone\Timezone;

use function PHPUnit\Framework\assertEquals;

test('get offset', function () {
    assertEquals('(UTC+08:00) Asia/Manila', Timezone::getOffset('Asia/Manila'));
});
