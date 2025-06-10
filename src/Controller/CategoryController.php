<?php

declare(strict_types=1);

namespace MicroCms\Controller;

use MicroCms\Model\Category;

/**
 * Controller for managing categories.
 */
class CategoryController extends BaseController
{
    /**
     * Create a new category.
     *
     * @param array $data The data for the new category.
     * @return bool True on success, false otherwise.
     */
    public function create(array $data): bool
    {
        $stmt = $this->db->prepare('INSERT INTO categories (name) VALUES (:name)');
        return $stmt->execute(['name' => $data['name']]);
    }

    /**
     * Read a category by ID.
     *
     * @param int $id The ID of the category.
     * @return Category|null The category or null if not found.
     */
    public function read(int $id): ?Category
    {
        $stmt = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();

        return $result ? new Category($result) : null;
    }

    /**
     * Update a category.
     *
     * @param int $id The ID of the category.
     * @param array $data The updated data.
     * @return bool True on success, false otherwise.
     */
    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare('UPDATE categories SET name = :name WHERE id = :id');
        return $stmt->execute([
            'id' => $id,
            'name' => $data['name']
        ]);
    }

    /**
     * Delete a category.
     *
     * @param int $id The ID of the category.
     * @return bool True on success, false otherwise.
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM categories WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    /**
     * List all categories.
     *
     * @return array An array of categories.
     */
    public function listAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM categories');
        return $stmt->fetchAll();
    }
}
