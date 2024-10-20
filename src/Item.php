<?php
class Item {
    protected $name;
    protected $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price; // Inicializa la propiedad price
    }

    public function getName() {
        return $this->name;
    }

    public function calculateFinalPrice() {
        return $this->price; // Devuelve el precio final
    }
}