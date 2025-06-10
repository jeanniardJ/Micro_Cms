<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use MicroCms\Controller\AuthController;

class AuthControllerTest extends TestCase
{
    public function testLogin(): void
    {
        $authController = new AuthController();
        $response = $authController->login('testuser', 'password');

        $this->assertTrue($response['success']);
        $this->assertArrayHasKey('token', $response);
    }

    public function testLogout(): void
    {
        $authController = new AuthController();
        $response = $authController->logout();

        $this->assertTrue($response['success']);
    }
}
