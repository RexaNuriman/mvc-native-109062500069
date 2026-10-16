<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/FilmController.php';

$controller = new FilmController($pdo);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;

    default:
        $controller->index();
        break;
}
