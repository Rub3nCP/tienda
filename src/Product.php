<?php
class Product extends Item {
    private $manufacturer;
    private $stock;
    private $maxStock;
    protected $price; // Asegúrate de que esta propiedad esté definida

    public function __construct($name, $price, $manufacturer, $stock, $maxStock) {
        parent::__construct($name, $price);
        $this->manufacturer = $manufacturer;
        $this->stock = $stock;
        $this->maxStock = $maxStock;
        $this->price = $price; // Inicializa la propiedad price
    }

    public function getManufacturer() {
        return $this->manufacturer;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getMaxStock() {
        return $this->maxStock;
    }

    public function getPrice() {
        return $this->price; // Devuelve el precio
    }
}
?>