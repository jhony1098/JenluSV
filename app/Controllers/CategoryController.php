<?php
declare(strict_types=1);

namespace App\Controllers;

final class CategoryController
{
    private const CATEGORIES = [
        'damas' => 'Damas',
        'caballeros' => 'Caballeros',
        'san-valentin' => 'San Valentín',
        'madres' => 'Día de las Madres',
        'padres' => 'Día del Padre',
        'fechas-especiales' => 'Fechas especiales',
        'personalizables' => 'Personalizables',
    ];

    public function show(string $slug): void
    {
        if (!isset(self::CATEGORIES[$slug])) {
            http_response_code(404);
            $pageTitle = 'Categoría no encontrada';
            $categoryName = null;
        } else {
            $categoryName = self::CATEGORIES[$slug];
            $pageTitle = $categoryName . ' | Jenlu Sv';
        }

        require __DIR__ . '/../views/category.php';
    }
}
