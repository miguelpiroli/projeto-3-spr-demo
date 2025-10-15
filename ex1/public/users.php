<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileUserRepository;
use App\Application\ListUsersService;

$repo = new FileUserRepository(__DIR__ . '/../storage/users.txt');
$service = new ListUsersService($repo);
$users = $service->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Usuários</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin: 2em auto; }
        th, td { border: 1px solid #aaa; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Usuários Cadastrados</h1>

    <?php if (empty($users)): ?>
        <p style="text-align: center;">Nenhum usuário cadastrado.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['name'] ?? ''); ?></td>
                        <td><?= htmlspecialchars($user['email'] ?? ''); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
