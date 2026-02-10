<?php

namespace App\Contracts\Interfaces;

use App\Models\User;

interface UserServiceInterface
{
    public function getById(int $id): ?User;

    public function getByEmail(string $email): ?User;

    public function create(array $data): User;

    public function update(User $user, array $data): User;

    public function delete(User $user): void;
}
