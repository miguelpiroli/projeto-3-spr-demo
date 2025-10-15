<?php

namespace App\Application;

use App\Contracts\ProductRepository;
use App\Contracts\ProductValidator;

class ProductService
{
    private ProductRepository $repositorio;
    private ProductValidator $validator;

    public function __construct(ProductRepository $repo, ProductValidator $validator)
    {
        $this->repositorio = $repositorio;
        $this->validator = $validator;
    }

 
    public function create(array $input): array
    {
        $errors = $this->validator->validate($input);
        if (!empty($errors)) {
            return ['success' => false, 'errors' => $errors, 'product' => null];
        }

    
        $all = $this->repositorio->findAll();
        $lastId = 0;
        if (!empty($all)) {
            $last = end($all);
            $lastId = (int) $last['id'];
        }
        $newId = $lastId + 1;

        $product = [
            'id' => $newId,
            'name' => trim($input['name']),
            'preco' => (float) $input['preco'],
        ];

        $saved = $this->repositorio->save($product);

        return ['success' => $saved, 'errors' => [], 'product' => $saved ? $product : null];
    }

    public function list(): array
    {
        return $this->repositorio->findAll();
    }
}
