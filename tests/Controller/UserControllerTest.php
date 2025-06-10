<?php

declare(strict_types=1);

namespace MicroCms\Tests\Controller;

use MicroCms\Controller\UserController;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    private UserController $userController;

    protected function setUp(): void
    {
        // Mock dependencies and initialize UserController
        $this->userController = new UserController();
    }

    public function testCreateUser(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'securepassword'
        ];

        $result = $this->userController->create($data);

        $this->assertTrue($result);
    }

    public function testReadUser(): void
    {
        $userId = 1;
        $user = $this->userController->read($userId);

        $this->assertNotNull($user);
        $this->assertEquals('John Doe', $user->getUsername());
    }

    // Add more tests for update, delete, and listAll methods
}
