<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Infra\FileProductRepository;
use App\Domain\SimpleProductValidator;

$repo = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validator = new SimpleProductValidator();
$service = new ProductService($repositorio, $validator);

$input = [
    'name' => $_POST['name'] ?? '',
    'preco' => $_POST['preco'] ?? '',
];

$result = $service->create($input);

if (!$result['success']) {
    http_response_code(422);
    $errors = $result['errors'];
    echo "<h1>Erros de validação</h1>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo '<li>' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</li>';
    }
    echo "</ul>";
    echo '<p><a href="index.php">Voltar</a></p>';
    exit;
}

http_response_code(201);
echo '<h1>Produto criado</h1>';
echo '<p><a href="products.php">Ver listagem</a></p>';
