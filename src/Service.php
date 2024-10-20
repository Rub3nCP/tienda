<?php
class Service extends Item {
    protected $name;
    protected $price;
    protected static $tax = 0.21; // Definimos el impuesto como una propiedad estática

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function calculateFinalPrice() {
        return $this->price * (1 + self::$tax); // Usamos self:: para acceder a la propiedad estática
    }
}
?>