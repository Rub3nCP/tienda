<?php
require_once '../src/Item.php';
require_once '../src/Product.php';
require_once '../src/PerishableProduct.php';
require_once '../src/Service.php';
require_once '../src/Shop.php';

// Crear una instancia de la tienda
$shop = new Shop();

// Agregar productos
$product1 = new Product("Cereal", 3.21, "Cereales S.A.", 500, 1000);
$product2 = new Product("Arroz", 2.14, "Granos S.A.", 300, 800);
$product3 = new PerishableProduct("Leche Caducada", 0.00, "Lácteos S.A.", 100, 500, "2023-10-01");
$product4 = new PerishableProduct("Pan Fresco", 1.15, "Panadería El Buen Gusto", 500, 300, date('Y-m-d', strtotime('+2 days')));
$product5 = new PerishableProduct("Yogur", 0.96, "Lácteos S.A.", 200, 150, date('Y-m-d', strtotime('+20 days')));

// Agregar servicios
$panDeMolde = new Service('Ya caducado el Pan de Molde', 2.50, null, date('Y-m-d', strtotime('-1 days'))); // Caducado
$leche = new Service('Fecha caducidad de Leche Entera', 1.20, null, date('Y-m-d', strtotime('+7 days')));
$queso = new Service('Caducidad del Queso Manchego', 5.00, null, date('Y-m-d', strtotime('+10 days')));
$panIntegral = new Service('Pan Integral caducado', 3.00, null, date('Y-m-d', strtotime('-15 days'))); // Caducado hace 15 días
$aceiteDeOliva = new Service('Aceite de Oliva caducado', 8.00, null, date('Y-m-d', strtotime('-1 month'))); // Caducado hace 1 mes

$servicioExpress = new Service('Servicio Express', 25.00, null, date('Y-m-d '));
$servicioLimpieza = new Service('Servicio de Limpieza', 50.00, null , date('Y-m-d', strtotime('+15 days'))); // Caducado hace 15 días
$servicioReparacion = new Service('Servicio de Reparación', 75.00, null, date('Y-m-d', strtotime('+1 month')));
$servicioMantenimiento = new Service('Servicio de Mantenimiento', 100.00, null, date('Y-m-d', strtotime('+3 months')));

// Agregar productos y servicios a la tienda
$shop->addItem($product1);
$shop->addItem($product2);
$shop->addItem($product3);
$shop->addItem($product4);
$shop->addItem($product5);
$shop->addItem($panDeMolde);
$shop->addItem($leche);
$shop->addItem($queso);
$shop->addItem($panIntegral);
$shop->addItem($aceiteDeOliva);
$shop->addItem($servicioExpress);
$shop->addItem($servicioLimpieza);
$shop->addItem($servicioReparacion);
$shop->addItem($servicioMantenimiento);

// Obtener todos los artículos
$items = $shop->getItems();

// Separar productos y servicios
$products = [];
$services = [];

foreach ($items as $item) {
    if ($item instanceof Product) {
        $products[] = $item;
    } elseif ($item instanceof Service) {
        $services[] = $item;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Virtual</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>¡Bienvenido a nuestra tienda virtual!</h1>
        <p>Aquí tienes un resumen de los artículos disponibles, organizados por tipo, junto con sus precios y detalles:</p>

        <h2>Productos Disponibles</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio (€)</th>
                    <th>Tipo</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product->getName()) ?></td>
                        <td><?= number_format($product->getPrice(), 2) ?></td>
                        <td>Producto</td>
                        <td>Fabricante: <?= htmlspecialchars($product->getManufacturer()) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Servicios Disponibles</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio (€)</th>
                    <th>Tipo</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= htmlspecialchars($service->getName()) ?></td>
                        <td><?= number_format($service->getPrice(), 2) ?></td>
                        <td>Servicio</td>
                        <td>
                            <?php if ($service->getEventDate() !== null): ?>
                                Fecha del Evento: <?= htmlspecialchars($service->getEventDate()->format('Y-m-d')) ?>
                            <?php else: ?>
                                Sin fecha
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>