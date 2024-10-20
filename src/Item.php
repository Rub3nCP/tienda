<?php
abstract class Item {
    protected $name;
    protected $basePrice;
    protected static $taxRate = 0.07; // 7%

    public function __construct($name, $basePrice) {
        $this->name = $name;
        $this->basePrice = $basePrice;
    }

    public function calculateFinalPrice() {
        return round($this->basePrice * (1 + self::$taxRate), 2);
    }

    public function getName() {
        return $this->name;
    }

    public static function setTaxRate($rate) {
        self::$taxRate = $rate;
    }
}