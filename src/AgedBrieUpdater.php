<?php

namespace Runroom\GildedRose;

class AgedBrieUpdater implements GildedRoseUpdaterInterface {
    /**
     * @inheritDoc
     */
    public function update($item) {
        // Aged Brie increases double! tasty!
        $item->quality = $item->quality + 2;
        // make sure about the max quality restriction.
        if ($item->quality > GildedRose::MAX_QUALITY) {
            $item->quality = GildedRose::MAX_QUALITY;
        }

        return $item;
    }
}
