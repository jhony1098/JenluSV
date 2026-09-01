<?php
declare(strict_types=1);

session_start();

require __DIR__ . '/config/database.php';
require __DIR__ . '/app/Models/Product.php';
require __DIR__ . '/app/Models/Review.php';
require __DIR__ . '/app/Controllers/ApiController.php';

use App\Controllers\ApiController;
use App\Models\Product;
use App\Models\Review;

if (isset($_GET['action'])) {
    try {
        $api = new ApiController(new Product(database()), new Review(database()));
        $action = $_GET['action'];
        if ($action === 'products') $api->products();
        elseif ($action === 'cart') $api->cart();
        elseif ($action === 'reviews') $api->reviews();
        else { http_response_code(404); echo json_encode(['error' => 'Ruta no disponible']); }
    } catch (PDOException $exception) {
        http_response_code(500);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['error' => 'No se pudo conectar a la base de datos. Importa database/jenlu_sv.sql en phpMyAdmin.']);
    }
    exit;
}

require __DIR__ . '/app/views/home.php';
