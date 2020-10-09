<?php

namespace Runroom\GildedRose;

/**
 * Class GildedRoseUpdaterFactory
 * @package Runroom\GildedRose
 */
class GildedRoseUpdaterFactory {

    /**
     * @param string $itemName
     * @return mixed Updater object.
     */
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
