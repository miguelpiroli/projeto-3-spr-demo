<?php
namespace App\Domain;

interface UserRepository
{
    public function save(array $user): void;
    public function findAll(): array;
}
