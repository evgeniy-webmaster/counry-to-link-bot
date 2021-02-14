<?php


namespace app\lib;

use Stidges\CountryFlags\CountryFlag;


class MessageBuilder
{
    public static function getFlagAndWikiLinkByCountryCode($countryName)
    {
        $converter = new CountryConverter();
        $code = $converter->getIso2CodeByName($countryName);

        if ($code === null) {
            return 'Sorry, country is not found by this name.';
        }

        $countryFlag = new CountryFlag;

        $link = $converter->getWikiLinkByName($countryName);
        return $countryFlag->get($code) . " $link";
    }
}