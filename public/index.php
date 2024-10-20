<?php
require_once '../src/Item.php';
require_once '../src/Product.php';
require_once '../src/PerishableProduct.php';
require_once '../src/Service.php';
require_once '../src/Shop.php';

// Crear una instancia de la tienda
$shop = new Shop();

// Agregar algunos productos
$product1 = new Product("Cereal", 3.00, "Cereales S.A.", 500, 1000);
$product2 = new PerishableProduct("Leche", 2.50, "Lácteos S.A.", 1000, 1000, "2024-10-20");
$product3 = new PerishableProduct("Pan", 1.20, "Panadería El Buen Gusto", 500, 500, "2024-10-15");
$service1 = new Service('Servicio A', 100);
$service2 = new Service('Servicio B', 200);

// Agregar productos y servicios a la tienda
$shop->addItem($product1);
$shop->addItem($product2);
$shop->addItem($product3);
$shop->addItem($service1);
$shop->addItem($service2);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Productos y Servicios</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Tienda de Productos y Servicios</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio Final</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shop->getItems() as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item->getName()); ?></td>
                    <td><?php echo number_format($item->calculateFinalPrice(), 2); ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>