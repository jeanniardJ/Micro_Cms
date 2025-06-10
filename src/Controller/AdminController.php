<?php

declare(strict_types=1);

namespace MicroCms\Controller;

/**
 * Controller for managing the backoffice.
 */
class AdminController extends BaseController
{
    public function dashboard(): void
    {
        // Render the admin dashboard view
        echo 'Welcome to the Admin Dashboard';
    }

    // Add CRUD methods for articles, categories, and users

    public function createArticle(array $data): void
    {
        // Logic to create an article
    }

    public function readArticle(int $id): array
    {
        // Logic to read an article
        return ['id' => $id, 'title' => 'Sample Title', 'content' => 'Sample Content'];
    }

    public function updateArticle(int $id, array $data): void
    {
        // Logic to update an article
    }

    public function deleteArticle(int $id): void
    {
        // Logic to delete an article
    }

    // Similar methods for categories and users
}
