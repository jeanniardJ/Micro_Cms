<?php

declare(strict_types=1);

namespace MicroCms\Controller;

use PDO;

/**
 * Controller for handling user authentication.
 */
class AuthController extends BaseController
{
    public function login(string $email, string $password): bool
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }

        return false;
    }

    public function logout(): void
    {
        session_destroy();
    }

    public function isAuthenticated(): bool
    {
        return isset($_SESSION['user_id']);
    }
}
