<?php
require_once 'Product.php';

class PerishableProduct extends Product {
    protected $expirationDate;

    public function __construct($name, $basePrice, $manufacturer, $weight, $volume, $expirationDate) {
        parent::__construct($name, $basePrice, $manufacturer, $weight, $volume);
        $this->expirationDate = new DateTime($expirationDate);
    }

    public function isExpired() {
        return new DateTime() > $this->expirationDate;
    }

    public function daysToExpire() {
        $today = new DateTime();
        return $today->diff($this->expirationDate)->days;
    }

    public function calculateFinalPrice() {
        $price = parent::calculateFinalPrice();
        if ($this->isExpired()) {
            return 0;
        } elseif ($this->daysToExpire() <= 30) {
            $price *= 0.9; // 10% discount
        }
        return round($price, 2);
    }
}
?>
