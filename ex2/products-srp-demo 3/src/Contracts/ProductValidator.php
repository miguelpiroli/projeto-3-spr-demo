<?php

namespace App\Contracts;

interface ProductValidator
{
    /**
     * 
     * @param array $input
     * @return string[]
     */
    public function validate(array $input): array;
}
