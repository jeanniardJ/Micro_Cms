<?php

declare(strict_types=1);

namespace MicroCms\Repository;

use MicroCms\Model\Article;
use MicroCms\Database\DatabaseManager;
use PDO;

class ArticleRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getConnection();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare('INSERT INTO articles (title, content, category_id) VALUES (:title, :content, :category_id)');
        return $stmt->execute([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id']
        ]);
    }

    public function findById(int $id): ?Article
    {
        $stmt = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();

        return $result ? new Article($result['title'], $result['content']) : null;
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare('UPDATE articles SET title = :title, content = :content WHERE id = :id');
        return $stmt->execute(['id' => $id, 'title' => $data['title'], 'content' => $data['content']]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM articles WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM articles');
        return $stmt->fetchAll(PDO::FETCH_CLASS, Article::class);
    }
}
