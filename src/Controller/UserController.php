<?php

declare(strict_types=1);

namespace MicroCms\Controller;

use MicroCms\Model\User;

/**
 * Controller for managing users.
 */
class UserController extends BaseController
{
    /**
     * Create a new user.
     *
     * @param array $data The data for the new user.
     * @return bool True on success, false otherwise.
     */
    public function create(array $data): bool
    {
        $stmt = $this->db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT)
        ]);
    }

    /**
     * Read a user by ID.
     *
     * @param int $id The ID of the user.
     * @return User|null The user or null if not found.
     */
    public function read(int $id): ?User
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();

        return $result ? new User($result['username'], $result['email'], $result['password']) : null;
    }

    /**
     * Update a user.
     *
     * @param int $id The ID of the user.
     * @param array $data The updated data.
     * @return bool True on success, false otherwise.
     */
    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare('UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id');
        return $stmt->execute([
            'id' => $id,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT)
        ]);
    }

    /**
     * Delete a user.
     *
     * @param int $id The ID of the user.
     * @return bool True on success, false otherwise.
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM users WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    /**
     * List all users.
     *
     * @return array An array of users.
     */
    public function listAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }
}
