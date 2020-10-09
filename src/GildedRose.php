<?php

namespace Runroom\GildedRose;

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

    function __construct($items) {
        $this->items = $items;
    }

    function update_quality() {
        foreach ($this->items as $item) {

            // Sulfuras does not change,
            // because it is composed of flaming red elementium
            // and etched from end to end with intricate runes.
            if ($item->name == self::SULFURAS) {
                continue;
            }

            // Aged Brie increases double! tasty!
            if ($item->name == self::AGED_BRIE) {
                $item->quality = $item->quality + 2;
                // make sure about the max quality restriction.
                if ($item->quality > self::MAX_QUALITY) {
                    $item->quality = self::MAX_QUALITY;
                }
                continue;
            }

            // Backstage passes to a TAFKAL80ETC concert changes according to some rules
            // (Blizzard t-shirt not included)
            if ($item->name == self::BACKSTAGE) {
                if ($item->sell_in > 10) {
                    $item->quality = $item->quality + 1;
                    continue;
                }

                if ($item->sell_in > 5 && $item->sell_in <= 10) {
                    $item->quality = $item->quality + 2;
                    continue;
                }

                if ($item->sell_in > 0 && $item->sell_in <= 5) {
                    $item->quality = $item->quality + 3;
                    continue;
                }

                if ($item->sell_in <= 0) {
                    $item->quality = 0;
                    continue;
                }
            }

            // All items degrade quality over time.
            $item->quality = $item->quality - 1;

            // Also, degrade again (double) when sell in has passed.
            if ($item->sell_in < 0) {
                $item->quality = $item->quality - 1;
            }

            // Finally, make sure quality is not greather than 50...
            if ($item->quality > self::MAX_QUALITY) {
                $item->quality = self::MAX_QUALITY;
            }

            // ... and is not negative.
            if ($item->quality < 0) {
                $item->quality = 0;
            }
        }
    }
}
