<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/models/Film.php';

$filmModel = new Film($pdo);
$films = $filmModel->getAll();

echo '<pre>';
print_r($films);
echo '</pre>';
