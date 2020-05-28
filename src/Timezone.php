<?php

namespace Lloricode\Timezone;

use DateTime;
use DateTimeZone;
use InvalidArgumentException;

class Timezone
{
    public static function generateList(array $regions = ['ALL']): array
    {
        if (empty($regions)) {
            throw new InvalidArgumentException('Empty array argument not allowed.');
        }

        $timezones = [];

        foreach ($regions as $region) {
            $arg = "DateTimeZone::$region";

            if (!defined($arg)) {
                throw new InvalidArgumentException("DateTimeZone::$region not found.");
            }

            $timezones = array_merge($timezones, DateTimeZone::listIdentifiers(constant($arg)));
        }

        $timezoneOffsets = [];
        foreach ($timezones as $timezone) {
            $timezoneOffsets[$timezone] = (new DateTimeZone($timezone))
                ->getOffset(new DateTime());
        }

        // sort timezone by offset
        asort($timezoneOffsets);

        $timezoneList = [];
        foreach ($timezoneOffsets as $timezone => $offset) {
            $offsetPrefix = $offset < 0 ? '-' : '+';
            $offsetFormatted = gmdate('H:i', abs($offset));

            $prettyOffset = "UTC${offsetPrefix}${offsetFormatted}";

            $timezoneList[$timezone] = "(${prettyOffset}) $timezone";
        }

        return $timezoneList;
    }

    public static function getOffset(string $timezone): string
    {
        return self::generateList()[$timezone];
    }
}