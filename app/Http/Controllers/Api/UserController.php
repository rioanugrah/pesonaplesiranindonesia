<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function __construct(
        User $user
    ){
        $this->user = $user;
    }

    public function getUser()
    {
        $data = $this->user->where('generate',auth()->user()->generate)->first();

        if (empty($data)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Gagal!',
                'message_content' => 'User Tidak Ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'generate' => $data->generate,
                'username' => $data->username,
                'name' => $data->name,
                'email' => $data->email,
            ]
        ]);
    }

    public function getUserDetail($generate)
    {
        $data = $this->user->where('generate',$generate)->first();

        if (empty($data)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Gagal!',
                'message_content' => 'User Tidak Ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'generate' => $data->generate,
                'username' => $data->username,
                'name' => $data->name,
                'email' => $data->email,
            ]
        ]);
    }
}
