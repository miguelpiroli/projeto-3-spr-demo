<?php

namespace App\Infra;

use App\Contracts\ProductRepository;

class FileProductRepository implements ProductRepository
{
    private string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
        
        if (!file_exists(dirname($this->file))) {
            mkdir(dirname($this->file), 0777, true);
        }
        if (!file_exists($this->file)) {
            touch($this->file);
        }
    }

    public function save(array $product): bool
    {
        $line = json_encode($product, JSON_UNESCAPED_UNICODE);
        if ($line === false) {
            return false;
        }
        $line .= PHP_EOL;
        return (bool) file_put_contents($this->file, $line, FILE_APPEND | LOCK_EX);
    }

    public function findAll(): array
    {
        $items = [];
        $handle = fopen($this->file, 'r');
        if ($handle === false) {
            return [];
        }
        while (($line = fgets($handle)) !== false) {
            $line = trim($line);
            if ($line === '') {
                continue;
            }
            $decoded = json_decode($line, true);
            if (is_array($decoded)) {
                $items[] = $decoded;
            }
        }
        fclose($handle);
        return $items;
    }
}
