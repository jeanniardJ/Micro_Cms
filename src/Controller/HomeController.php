<?php

declare(strict_types=1);

namespace MicroCms\Controller;

/**
 * Controller for managing the home.
 */
class HomeController extends BaseController
{
    public function home(): void
    {
        // Render the home view
        echo 'Welcome to the Home';
    }
}
