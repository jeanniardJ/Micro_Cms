<?php

declare(strict_types=1);

namespace MicroCms\Database;

use PDO;
use RuntimeException;
use MicroCms\Database\DatabaseConnection;

/**
 * DatabaseManager is responsible for managing the database connection.
 * This class uses the Singleton pattern to ensure a single instance of the connection.
 */
class DatabaseManager
{
    private static ?PDO $connection = null;

    /**
     * Get the PDO connection instance.
     *
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            $dsn = str_replace('"', '', getenv('DB_DSN'));
            $username = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');

            if (!$dsn || !$username || !$password) {
                throw new RuntimeException('Database configuration is missing in environment variables.');
            }

            self::$connection = DatabaseConnection::getInstance($dsn, $username, $password)->getConnection();
        }

        return self::$connection;
    }
}
