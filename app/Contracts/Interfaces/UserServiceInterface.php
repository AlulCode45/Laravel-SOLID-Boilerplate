<?php

namespace App\Contracts\Interfaces;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function getById(int $id): ?User;

    public function getByEmail(string $email): ?User;

    public function create(array $data): User;

    public function update(User $user, array $data): User;

    public function delete(User $user): void;
}
