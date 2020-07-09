<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * ユーザー取得
     * @param Request $request
     * @return UserResource
     */
    public function index(Request $request)
    {
        $users = User::find(1);

        return new UserResource($request->user());
    }

}
