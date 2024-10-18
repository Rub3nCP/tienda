<?php

namespace Daw2\Tienda;

class Product {
    private $name;
    private $description;
    private $weight;
    private $volume;
    private $brand;
    private $price;

    public function __construct($name, $description, $weight, $volume, $brand, $price) {
        if ($weight < 0 || $volume < 0 || $price < 0) {
            throw new \InvalidArgumentException("El peso, volumen y precio deben ser positivos.");
        }

        $this->name = $name;
        $this->description = $description;
        $this->weight = $weight;
        $this->volume = $volume;
        $this->brand = $brand;
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function shippingCost() {
        $costWeight = $this->weight * 0.0002;
        $volumeCost = floor($this->volume / 1000);
        return round($costWeight + $volumeCost, 2); 
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getVolume() {
        return $this->volume;
    }

    public function getBrand() {
        return $this->brand;
    }
}

class ProductPerishable extends Product {
    private $expiryDate;

    public function expiredProduct() {
        return $this->expiryDate < new \DateTime(); // Devuelve true si ya ha caducado, false en caso contrario
    }
}
