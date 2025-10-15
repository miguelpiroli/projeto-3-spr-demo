<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Infra\FileProductRepository;
use App\Domain\SimpleProductValidator;

$repo = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validator = new SimpleProductValidator();
$service = new ProductService($repositorio, $validator);

$products = $service->list();

?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Listagem de Produtos</title>
</head>
<body>
    <h1>Produtos</h1>
    <p><a href="index.php">Novo produto</a></p>

    <?php if (empty($products)): ?>
        <p>Nenhum produto cadastrado</p>
    <?php else: ?>
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $prodcut): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($prodcut['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($prodcut['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo number_format((float)$prodcut['preco'], 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
