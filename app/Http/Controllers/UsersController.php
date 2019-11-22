<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
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

    public function update(Request $request)
    {
        if (Helper::isJson($request->getContent())) {
            $requestData = json_decode($request->getContent(), 1);
        } else {
            $requestData = $request->all();
        }
        foreach ($requestData as $key => $data) {
            if (empty($data))
                return response()->json(ucfirst($key) . ' Required!', 422);
        }

        $id = $requestData['id'];
        $comments = $requestData['comments'];
        $password = $requestData['password'];
        if (!is_numeric($id))
            return response()->json('Invalid Id', 422);


        if ($password != "720DF6C2482218518FA20FDC52D4DED7ECC043AB")
            return response()->json('Invalid password', 401);

        return $this->updateData($id, $comments, $password);

    }

    public function updateData($id, $comments, $password = '720DF6C2482218518FA20FDC52D4DED7ECC043AB')
    {
        $userData = User::find($id);
        if (empty($userData))
            return response()->json('User Not Exist!', 404);

        $userData->update(['comments' => $userData->comments . '
' . $comments]);
        return response()->json('OK', 200);
    }
}
