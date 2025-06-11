<?php

declare(strict_types=1);

namespace MicroCms\Repository;

use MicroCms\Model\Category;
use MicroCms\Database\DatabaseManager;
use PDO;

class CategoryRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getConnection();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare('INSERT INTO categories (name, description) VALUES (:name, :description)');
        return $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    }

    public function findById(int $id): ?Category
    {
        $stmt = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();

        return $result ? new Category($result) : null;
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare('UPDATE categories SET name = :name, description = :description WHERE id = :id');
        return $stmt->execute(['id' => $id, 'name' => $data['name'], 'description' => $data['description']]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM categories WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_CLASS, Category::class);
    }
}
