<?php
namespace App\Application;

use App\Domain\UserRepository;

class ListUsersService
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        return $this->repository->findAll();
    }
}
