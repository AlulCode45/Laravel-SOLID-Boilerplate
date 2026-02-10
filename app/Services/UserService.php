<?php

namespace App\Services;

use App\Contracts\Interfaces\UserServiceInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService implements UserServiceInterface
{
    public function __construct(private UserRepositoryInterface $users)
    {
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->users->paginate($perPage);
    }

    public function getById(int $id): ?User
    {
        return $this->users->findById($id);
    }

    public function getByEmail(string $email): ?User
    {
        return $this->users->findByEmail($email);
    }

    public function create(array $data): User
    {
        return $this->users->create($data);
    }

    public function update(User $user, array $data): User
    {
        return $this->users->update($user, $data);
    }

    public function delete(User $user): void
    {
        $this->users->delete($user);
    }
}
