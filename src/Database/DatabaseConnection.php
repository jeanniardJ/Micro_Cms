<?php

declare(strict_types=1);

namespace MicroCms\Database;

use PDO;
use PDOException;

/**
 * This class implements the Singleton pattern to ensure a single database connection instance.
 */
class DatabaseConnection
{
    private static ?DatabaseConnection $instance = null;
    private PDO $connection;

    private function __construct(string $dsn, string $username, string $password)
    {
        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new \RuntimeException('Database connection failed: ' . $e->getMessage());
        }
    }

    public static function getInstance(string $dsn, string $username, string $password): self
    {
        if (self::$instance === null) {
            self::$instance = new self($dsn, $username, $password);
        }

        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
