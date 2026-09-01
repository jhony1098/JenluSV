<?php
declare(strict_types=1);

require __DIR__ . '/app/Controllers/CategoryController.php';

use App\Controllers\CategoryController;

$slug = preg_replace('/[^a-z-]/', '', $_GET['categoria'] ?? '') ?: '';
(new CategoryController())->show($slug);
