<?php
declare(strict_types=1);

namespace App\Models;

use PDO;

final class Review
{
    public function __construct(private PDO $db) {}

    public function all(int $productId): array
    {
        $query = $this->db->prepare('SELECT customer_name, rating, comment, created_at FROM product_reviews WHERE product_id = :id AND is_visible = 1 ORDER BY id DESC');
        $query->execute(['id' => $productId]);
        return $query->fetchAll();
    }

    public function create(int $productId, string $name, int $rating, string $comment): void
    {
        $query = $this->db->prepare('INSERT INTO product_reviews (product_id, customer_name, rating, comment) VALUES (:product_id, :customer_name, :rating, :comment)');
        $query->execute(['product_id'=>$productId, 'customer_name'=>$name, 'rating'=>$rating, 'comment'=>$comment]);
    }
}
