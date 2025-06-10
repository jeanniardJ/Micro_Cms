<?php

use MicroCms\Controller\AuthController;
use MicroCms\Controller\AdminController;
use MicroCms\Controller\HomeController;

return [
    '/login' => [AuthController::class, 'login'],
    '/logout' => [AuthController::class, 'logout'],
    '/admin' => [AdminController::class, 'dashboard'],
    '/' => [HomeController::class, 'home'],

    // Add routes for CRUD operations
    'POST' => [
        '/admin/article/create' => [AdminController::class, 'createArticle'],
        '/admin/article/update/{id}' => [AdminController::class, 'updateArticle'],
        '/admin/article/delete/{id}' => [AdminController::class, 'deleteArticle'],
    ],
    'GET' => [
        '/admin/article/read/{id}' => [AdminController::class, 'readArticle'],
    ],
];
