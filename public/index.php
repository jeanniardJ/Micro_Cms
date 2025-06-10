<?php

session_start();
define('BASE_PATH', dirname(__DIR__));

// Inclure l'autoload de Composer
require_once BASE_PATH . '/vendor/autoload.php';

// Charger les variables d'environnement à partir du fichier .env
function loadEnv(string $basePath): void
{
    $env = getenv('APP_ENV') ?: 'prod'; // Par défaut, l'environnement est 'prod'
    $envFile = $basePath . '/.env';

    if ($env !== 'prod') {
        $envFile .= '.' . $env;
    }

    if (!file_exists($envFile)) {
        return;
    }

    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) {
            continue;
        }

        [$key, $value] = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        if (!array_key_exists($key, $_SERVER) && !array_key_exists($key, $_ENV)) {
            putenv("$key=$value");
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}

// Charger le fichier .env approprié
loadEnv(BASE_PATH);

// Inclure les routes dynamiques
$routes = require BASE_PATH . '/src/routes.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (array_key_exists($path, $routes)) {
    [$controllerClass, $method] = $routes[$path];
    $controller = new $controllerClass();
    $controller->$method();
} else {
    http_response_code(404);
    echo 'Page not found';
}
