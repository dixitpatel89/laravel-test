<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
    }

    public function getUserById($id)
    {
        if (!is_numeric($id))
            return response()->json('Invalid Id', 422);

        $userData = User::find($id);
        if (empty($userData))
            return response()->json('User Not Exist!', 404);

        return view('user', ['user' => $userData]);
    }
}
