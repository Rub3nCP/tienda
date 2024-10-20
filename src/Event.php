<?php
require_once 'Service.php';

class Event extends Service {
    private $eventDate;

    public function __construct($name, $basePrice, $eventDate) {
        parent::__construct($name, $basePrice);
        $this->eventDate = new DateTime($eventDate);
    }

    public function eventOccurred() { 
        return new DateTime() > $this->eventDate;
    }

    public function daysToEvent() { 
        $today = new DateTime();
        return $today->diff($this->eventDate)->days;
    }

    public function calculateFinalPrice() {
        $price = $this->basePrice;
        if ($this->daysToEvent() <= 0) {
            $price *= 1.5; 
        } elseif ($this->daysToEvent() <= 7) {
            $price *= 1.2; 
        }
        return round($price * (1 + self::$tax), 2);
    }
}
?>
