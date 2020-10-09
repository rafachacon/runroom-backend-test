<?php

namespace Runroom\GildedRose;

class BackstageUpdater implements GildedRoseUpdaterInterface {
    /**
     * @inheritDoc
     */
    public function update($item) {
        // Backstage passes to a TAFKAL80ETC concert changes according to some rules
        // (Blizzard t-shirt not included)

        if ($item->sell_in <= 0) {
            $item->quality = 0;
        }

        if ($item->sell_in > 0 && $item->sell_in <= 5) {
            $item->quality = $item->quality + 3;
        }

        if ($item->sell_in > 5 && $item->sell_in <= 10) {
            $item->quality = $item->quality + 2;
        }

        if ($item->sell_in > 10) {
            $item->quality = $item->quality + 1;
        }

        return $item;
    }
}
