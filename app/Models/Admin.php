<?php
declare(strict_types=1);

namespace App\Models;

use PDO;

final class Admin
{
    public function __construct(private PDO $db) {}

    public function findByUsername(string $username): ?array
    {
        $query = $this->db->prepare('SELECT id, username, password_hash FROM admins WHERE username = :username LIMIT 1');
        $query->execute(['username' => $username]);
        return $query->fetch() ?: null;
    }
}
