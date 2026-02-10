<?php

namespace App\Services;

use App\Contracts\Interfaces\UserServiceInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{
    public function __construct(private UserRepositoryInterface $users)
    {
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
