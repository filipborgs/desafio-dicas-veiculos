<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(Request $request, UserContract $userContract)
    {
        $user = $userContract->save($request['user']);
        return response()->json($user, 201);
    }
}
