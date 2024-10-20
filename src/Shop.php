<?php
require_once 'Item.php'; // Asegúrate de que la clase Item esté incluida
require_once 'Service.php'; // Asegúrate de que la clase Service esté incluida

class Shop {
    private $items = []; // Arreglo para almacenar los artículos

    // Método para agregar un artículo a la tienda
    public function addItem(Item $item) {
        $this->items[] = $item; // Agrega el artículo al arreglo
    }

    // Método para obtener todos los artículos
    public function getItems() {
        return $this->items; // Devuelve el arreglo de artículos
    }

    // Método para mostrar los artículos
    public function displayItems() {
        foreach ($this->getItems() as $item) {
            echo "Nombre: " . $item->getName() . ", Precio final: " . $item->calculateFinalPrice() . "\n";
        }
    }
}

// Ejemplo de uso
$shop = new Shop();
$service1 = new Service('Servicio A', 100);
$service2 = new Service('Servicio B', 200);

// Agrega servicios a la tienda
$shop->addItem($service1);
$shop->addItem($service2);

// Muestra los artículos de la tienda
$shop->displayItems();
?>