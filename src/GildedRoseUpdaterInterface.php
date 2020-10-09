<?php

namespace Runroom\GildedRose;

/**
 * Interface GildedRoseUpdaterInterface
 * @package Runroom\GildedRose
 */
interface GildedRoseUpdaterInterface {
    /**
     * Updates the item accordingly to its kind.
     *
     * @param Item $item
     * @return Item
     */
    public function update($item);
}
