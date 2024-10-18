<?php 

namespace Daw2\Tienda;

abstract class Offer{
// Cada uno de estos elementos que se pueden vender, tanto productos como servicios,
// deben tener al menos un nombre, un precio base, y características específicas que se
// detallan más adelante.

    private $name;
    private $basePrice;
    private $taxRate = 0.7;

    public function __construct($name, $basePrice, $taxRate)
    {
        $this->name = $name;
        $this->basePrice = $basePrice;
        $this->taxRate = $taxRate;
    }

}