<?php

declare(strict_types=1);

namespace MicroCms\Controller;

use MicroCms\Model\Article;
use MicroCms\Repository\ArticleRepository;

/**
 * Controller for managing articles.
 */
class ArticleController extends BaseController
{
    private ArticleRepository $repository;

    public function __construct()
    {
        $this->repository = new ArticleRepository();
    }

    /**
     * Create a new article.
     *
     * @param array $data The data for the new article.
     * @return bool True on success, false otherwise.
     */
    public function create(array $data): bool
    {
        return $this->repository->create($data);
    }

    /**
     * Read an article by ID.
     *
     * @param int $id The ID of the article.
     * @return Article|null The article or null if not found.
     */
    public function read(int $id): ?Article
    {
        return $this->repository->findById($id);
    }

    /**
     * Update an article.
     *
     * @param int $id The ID of the article to update.
     * @param array $data The new data for the article.
     * @return bool True on success, false otherwise.
     */
    public function update(int $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete an article.
     *
     * @param int $id The ID of the article to delete.
     * @return bool True on success, false otherwise.
     */
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    /**
     * List all articles.
     *
     * @return array An array of articles.
     */
    public function listAll(): array
    {
        return $this->repository->findAll();
    }
}
