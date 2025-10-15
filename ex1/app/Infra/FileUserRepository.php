<?php
namespace App\Infra;

use App\Domain\UserRepository;

class FileUserRepository implements UserRepository
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        if (!file_exists($filePath)) {
            file_put_contents($filePath, '');
        }
    }

    public function save(array $user): void
    {
        $json = json_encode($user) . PHP_EOL;
        file_put_contents($this->filePath, $json, FILE_APPEND);
    }

    public function findAll(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $users = [];

        foreach ($lines as $line) {
            $decoded = json_decode($line, true);
            if (is_array($decoded)) {
                $users[] = $decoded;
            }
        }

        return $users;
    }
}
