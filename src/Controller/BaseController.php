<?php

declare(strict_types=1);

namespace MicroCms\Controller;

use MicroCms\Database\DatabaseManager;
use PDO;

/**
 * BaseController provides common functionality for all controllers.
 */
abstract class BaseController
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getConnection();
    }
}
