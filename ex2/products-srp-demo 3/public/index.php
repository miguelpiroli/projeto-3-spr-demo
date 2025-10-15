<?php

require __DIR__ . '/../vendor/autoload.php';

?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>
    <form action="create.php" method="post">
        <label>Nome: <input type="text" name="name" required></label><br><br>
        <label>Preço: <input type="number" step="0.01" name="preco" required></label><br><br>
        <button type="submit">Criar</button>
    </form>
    <p><a href="products.php">Ver listagem de produtos</a></p>
</body>
</html>
