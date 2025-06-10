<?php

declare(strict_types=1);

namespace MicroCms\Controller;

use MicroCms\Model\Article;

/**
 * Controller for managing articles.
 */
class ArticleController extends BaseController
{
    /**
     * Create a new article.
     *
     * @param array $data The data for the new article.
     * @return bool True on success, false otherwise.
     */
    public function create(array $data): bool
    {
        $stmt = $this->db->prepare('INSERT INTO articles (title, content, category_id) VALUES (:title, :content, :category_id)');
        return $stmt->execute([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id']
        ]);
    }

    /**
     * Read an article by ID.
     *
     * @param int $id The ID of the article.
     * @return Article|null The article or null if not found.
     */
    public function read(int $id): ?Article
    {
        $stmt = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();

        return $result ? new Article($result) : null;
    }

    /**
     * Update an article.
     *
     * @param int $id The ID of the article.
     * @param array $data The updated data.
     * @return bool True on success, false otherwise.
     */
    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare('UPDATE articles SET title = :title, content = :content, category_id = :category_id WHERE id = :id');
        return $stmt->execute([
            'id' => $id,
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id']
        ]);
    }

    /**
     * Delete an article.
     *
     * @param int $id The ID of the article.
     * @return bool True on success, false otherwise.
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM articles WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    /**
     * List all articles.
     *
     * @return array An array of articles.
     */
    public function listAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM articles');
        return $stmt->fetchAll();
    }
}
