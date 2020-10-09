<?php

namespace Runroom\GildedRose;

class Item {

    /**
     * @var string Item name
     */
    public $name;

    /**
     * @var int Item date (of adquisition, I assume).
     */
    public $sell_in;

    /**
     * @var int Item quality.
     */
    public $quality;

    /**
     * Item constructor.
     * @param string $name
     * @param int $sell_in
     * @param int $quality
     */
    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    /**
     * @return string
     */
    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

}
