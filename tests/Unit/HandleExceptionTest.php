<?php

declare(strict_types=1);

use Lloricode\Timezone\Timezone;

test('empty arguments', function () {
    Timezone::generateList([]);
})
    ->throws(
        InvalidArgumentException::class,
        'Empty array argument not allowed.'
    );

test('invalid arguments', function () {
    Timezone::generateList([11111111111111]);
})
    ->throws(
        InvalidArgumentException::class,
        'DateTimeZone::11111111111111 not found.'
    );
