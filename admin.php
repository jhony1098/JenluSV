<?php
declare(strict_types=1);
session_start();
require __DIR__ . '/config/database.php';
require __DIR__ . '/app/Models/Admin.php';
require __DIR__ . '/app/Models/Product.php';
require __DIR__ . '/app/Controllers/AdminController.php';
use App\Controllers\AdminController;
use App\Models\Admin;
use App\Models\Product;
(new AdminController(new Admin(database()), new Product(database())))->handle();
