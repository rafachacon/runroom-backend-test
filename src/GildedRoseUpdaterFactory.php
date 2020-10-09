<?php

namespace Runroom\GildedRose;

class GildedRoseUpdaterFactory {
    public static function getUpdater($itemName) {
        switch ($itemName) {
            case GildedRose::SULFURAS:
                $class = 'Runroom\GildedRose\SulfurasUpdater';
                break;

            case GildedRose::AGED_BRIE:
                $class = 'Runroom\GildedRose\AgedBrieUpdater';
                break;

            case GildedRose::BACKSTAGE:
                $class = 'Runroom\GildedRose\BackstageUpdater';
                break;

            default:
                $class = 'Runroom\GildedRose\CommonUpdater';
                break;
        }

        if (class_exists($class) != null) {
            return new $class;
        }
    }
}
