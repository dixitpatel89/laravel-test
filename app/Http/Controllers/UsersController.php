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

    public function update(Request $request, $id)
    {
        if (!is_numeric($id))
            return response()->json('Invalid Id', 422);

        foreach ($request->all() as $key => $data) {
            if (empty($data))
                return response()->json(ucfirst($key) . ' Required!', 422);
        }

        if ($request->password != "720DF6C2482218518FA20FDC52D4DED7ECC043AB")
            return response()->json('Invalid password', 401);

        $userData = User::find($id);
        if (empty($userData))
            return response()->json('User Not Exist!', 404);

        $userData->update(['comments' => $userData->comments . '
' . $request->comments]);
        return response()->json('OK', 200);
    }
}
