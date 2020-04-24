<?php

namespace Lloricode\Timezone;

use DateTime;
use DateTimeZone;

class Timezone
{
    public static function generateList(): array
    {
        static $regions = [
            DateTimeZone::AFRICA,
            DateTimeZone::AMERICA,
            DateTimeZone::ANTARCTICA,
            DateTimeZone::ASIA,
            DateTimeZone::ATLANTIC,
            DateTimeZone::AUSTRALIA,
            DateTimeZone::EUROPE,
            DateTimeZone::INDIAN,
            DateTimeZone::PACIFIC,
        ];

        $timezones = [];
        foreach ($regions as $region) {
            $timezones = array_merge($timezones, timezone_identifiers_list($region));
        }


        $timezoneOffsets = [];
        foreach ($timezones as $timezone) {
            $timezoneOffsets[$timezone] = (new DateTimeZone($timezone))
                ->getOffset(new DateTime);
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
}