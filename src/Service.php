<?php
class Service extends Item {
    private $eventDate;
    private $sessions;
    protected $price;

    public function __construct($name, $price, $sessions = null, $eventDate = null) {
        parent::__construct($name, $price);
        $this->sessions = $sessions;
        $this->price = $price;
        $this->eventDate = $eventDate ? new DateTime($eventDate) : null;
    }

    public function getEventDate() {
        return $this->eventDate;
    }

    public function getSessions() {
        return $this->sessions;
    }

    public function getPrice() {
        return $this->price;
    }
}
?>