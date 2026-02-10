<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct(private UserServiceInterface $users)
    {
    }

    public function index(Request $request)
    {
        $perPage = $request->integer('per_page', 15);
        $users = $this->users->paginate($perPage);

        return response()->json(['data' => $users]);
    }

    public function show(int $id)
    {
        $user = $this->users->getById($id);

        if (!$user) {
            abort(404);
        }

        return response()->json(['data' => $user]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = $this->users->create($data);

        return response()->json(['data' => $user], 201);
    }

    public function update(Request $request, int $id)
    {
        $user = $this->users->getById($id);

        if (!$user) {
            abort(404);
        }

        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => ['sometimes', 'string', 'min:8'],
        ]);

        $user = $this->users->update($user, $data);

        return response()->json(['data' => $user]);
    }

    public function destroy(int $id)
    {
        $user = $this->users->getById($id);

        if (!$user) {
            abort(404);
        }

        $this->users->delete($user);

        return response()->noContent();
    }
}
