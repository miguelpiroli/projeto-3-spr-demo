<?php

namespace App\Contracts;

interface ProductRepository
{
    /**
     * @param array $product
     * @return bool
     */
    public function save(array $product): bool;

    /**
     * @return array<int,array>
     */
    public function findAll(): array;
}
