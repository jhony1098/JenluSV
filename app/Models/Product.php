<?php
declare(strict_types=1);

namespace App\Models;

use PDO;

final class Product
{
    public function __construct(private PDO $db) {}

    public function all(string $category = 'all'): array
    {
        $sql = 'SELECT p.id, c.slug AS category, p.name, p.price, p.description FROM products p INNER JOIN categories c ON c.id = p.category_id WHERE p.is_active = 1';
        $params = [];
        if ($category !== 'all') { $sql .= ' AND c.slug = :category'; $params['category'] = $category; }
        $sql .= ' ORDER BY p.featured DESC, p.id DESC';
        $query = $this->db->prepare($sql); $query->execute($params); $products = $query->fetchAll();
        foreach ($products as &$product) { $product['images'] = $this->images((int)$product['id']); $product['price'] = (float)$product['price']; }
        return $products;
    }

    public function find(int $id): ?array { foreach ($this->all() as $product) if ((int)$product['id'] === $id) return $product; return null; }
    public function categories(): array { return $this->db->query('SELECT id, name FROM categories ORDER BY name')->fetchAll(); }
    public function adminAll(): array { return $this->db->query('SELECT p.id, p.name, p.price, c.name AS category_name, (SELECT image_url FROM product_images WHERE product_id = p.id ORDER BY position, id LIMIT 1) AS image_url FROM products p INNER JOIN categories c ON c.id = p.category_id ORDER BY p.id DESC')->fetchAll(); }

    public function findAdmin(int $id): ?array
    {
        $query = $this->db->prepare('SELECT p.id, p.category_id, p.name, p.description, p.price FROM products p WHERE p.id = :id');
        $query->execute(['id' => $id]); $product = $query->fetch();
        if (!$product) return null;
        $product['images'] = $this->images($id);
        return $product;
    }

    public function create(int $categoryId, string $name, string $description, float $price, array $imageUrls): void
    {
        $query = $this->db->prepare('INSERT INTO products (category_id, name, description, price) VALUES (:category_id, :name, :description, :price)');
        $query->execute(['category_id'=>$categoryId, 'name'=>$name, 'description'=>$description, 'price'=>$price]);
        $this->addImages((int)$this->db->lastInsertId(), $imageUrls);
    }

    public function update(int $id, int $categoryId, string $name, string $description, float $price): void
    {
        $query = $this->db->prepare('UPDATE products SET category_id=:category_id, name=:name, description=:description, price=:price WHERE id=:id');
        $query->execute(['id'=>$id, 'category_id'=>$categoryId, 'name'=>$name, 'description'=>$description, 'price'=>$price]);
    }

    public function addImages(int $productId, array $imageUrls): void
    {
        $position = (int)$this->db->query('SELECT COALESCE(MAX(position), 0) FROM product_images WHERE product_id = ' . (int)$productId)->fetchColumn();
        $query = $this->db->prepare('INSERT INTO product_images (product_id, image_url, label, position) VALUES (:product_id, :image_url, :label, :position)');
        foreach ($imageUrls as $url) { $position++; $query->execute(['product_id'=>$productId, 'image_url'=>$url, 'label'=>'Vista '.$position, 'position'=>$position]); }
    }

    public function deleteImage(int $id): void { $query = $this->db->prepare('DELETE FROM product_images WHERE id = :id'); $query->execute(['id'=>$id]); }
    public function delete(int $id): void { $query = $this->db->prepare('DELETE FROM products WHERE id = :id'); $query->execute(['id'=>$id]); }

    private function images(int $productId): array
    {
        $query = $this->db->prepare('SELECT id, image_url AS url, label FROM product_images WHERE product_id = :id ORDER BY position, id');
        $query->execute(['id'=>$productId]); return $query->fetchAll();
    }
}
