<?php 

namespace Daw2\Tienda;

class Shop
{
    private $productsAndServices = [];

    public function addProduct(Product $product)
    {
        $this->productsAndServices[] = $product;
    }
    public function addService(Service $service)
    {
        $this->productsAndServices[] = $service;
    }
    public function getProducts()
    {
        array_filter($this->productsAndServices, function($product) {
            return $product instanceof Product;
        });
    }

    public function getServices()
    {
        array_filter($this->productsAndServices, function($service) {
            return $service instanceof Service;
        });
    }

    public function getProductsAndServices()
    {
        return $this->productsAndServices;
    }
    
    
}