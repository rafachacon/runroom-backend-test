<?php

namespace Runroom\GildedRose;

class CommonUpdater implements GildedRoseUpdaterInterface {

    /**
     * @inheritDoc
     */
    public function update($item) {
        // A common item degrades quality over time.
        $item->quality = $item->quality - 1;

        // Also, degrades again (double) when "sell in" has passed.
        if ($item->sell_in < 0) {
        $item->quality = $item->quality - 1;
        }

        return $item;
    }
}
