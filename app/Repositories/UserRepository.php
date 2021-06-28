<?php

namespace App\Repositories;

use App\Contracts\UserContract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserContract
{
    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function save($userData)
    {
        $this->validator($userData, $this->model->rules());
        $user = $this->model->fill($userData);
        $user->password = Hash::make($userData['password']);
        return $user->save();
    }
}
