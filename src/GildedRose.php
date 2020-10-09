<?php

namespace Runroom\GildedRose;

/**
 * Class GildedRose
 * @package Runroom\GildedRose
 */
class GildedRose {

    const AGED_BRIE = "Aged Brie";
    const BACKSTAGE = "Backstage passes to a TAFKAL80ETC concert";
    const SULFURAS = "Sulfuras, Hand of Ragnaros";

    const MAX_QUALITY = 50;
    const MIN_QUALITY = 0;

    /**
     * @var Item[]
     */
    private array $items;

    /**
     * GildedRose constructor.
     * @param Item[] $items
     */
    function __construct($items) {
        $this->items = $items;
    }

    /**
     * Updates item quality using the GildedRoseUpdaterFactory factory.
     */
    function update_quality() {
        foreach ($this->items as $item) {

            // Get the specific updater for the item.
            $updater = GildedRoseUpdaterFactory::getUpdater($item->name);

            // Update and return it.
            $item = $updater->update($item);

            // Finally, make sure quality is not greather than 50...
            if ($item->quality > self::MAX_QUALITY) {
                $item->quality = self::MAX_QUALITY;
            }

            // ... and is not negative.
            if ($item->quality < self::MIN_QUALITY) {
                $item->quality = self::MIN_QUALITY;
            }
        }
    }
}
