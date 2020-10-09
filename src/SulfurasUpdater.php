<?php

namespace Runroom\GildedRose;

class SulfurasUpdater implements GildedRoseUpdaterInterface {
    /**
     * @inheritDoc
     */
    public function update($item) {
        // Sulfuras does not change,
        // because it is composed of flaming red elementium
        // and etched from end to end with intricate runes.
        return $item;
    }
}
