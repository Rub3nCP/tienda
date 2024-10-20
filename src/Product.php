<?php
require_once 'Item.php';

class Product extends Item {
    protected $manufacturer;
    protected $weight; // in grams
    protected $volume; // in cm3
    protected $expirationDate;

    public function __construct($name, $basePrice, $manufacturer, $weight, $volume, $expirationDate = null) {
        parent::__construct($name, $basePrice);
        $this->manufacturer = $manufacturer;
        $this->weight = $weight;
        $this->volume = $volume;
        $this->expirationDate = $expirationDate;
    }

    public function calculateShippingCost() {
        $cost = 2 + ($this->weight * 0.0002);
        $volumeIncrement = floor($this->volume / 1000);
        return round($cost + $volumeIncrement, 2);
    }

    public function isExpired() {
        return $this->expirationDate && $this->expirationDate < new DateTime();
    }

    public function daysUntilExpiration() {
        if ($this->expirationDate) {
            $now = new DateTime();
            return $now->diff($this->expirationDate)->days;
        }
        return null;
    }
}