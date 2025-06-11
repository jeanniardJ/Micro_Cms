<?php

declare(strict_types=1);

namespace MicroCms\Controller;

use MicroCms\Model\Category;
use MicroCms\Repository\CategoryRepository;

/**
 * Controller for managing categories.
 */
class CategoryController extends BaseController
{
    private CategoryRepository $repository;

    public function __construct()
    {
        $this->repository = new CategoryRepository();
    }

    /**
     * Create a new category.
     *
     * @param array $data The data for the new category.
     * @return bool True on success, false otherwise.
     */
    public function create(array $data): bool
    {
        return $this->repository->create($data);
    }

    /**
     * Read a category by ID.
     *
     * @param int $id The ID of the category.
     * @return Category|null The category or null if not found.
     */
    public function read(int $id): ?Category
    {
        return $this->repository->findById($id);
    }

    /**
     * Update a category.
     *
     * @param int $id The ID of the category to update.
     * @param array $data The new data for the category.
     * @return bool True on success, false otherwise.
     */
    public function update(int $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete a category.
     *
     * @param int $id The ID of the category to delete.
     * @return bool True on success, false otherwise.
     */
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    /**
     * List all categories.
     *
     * @return array An array of categories.
     */
    public function listAll(): array
    {
        return $this->repository->findAll();
    }
}
