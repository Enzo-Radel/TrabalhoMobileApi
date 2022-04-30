<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $data = $request->all();

        try {
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);
    
            $response = [
                'user' => $user,
            ];
            $status = 200;
        } catch (\Throwable $th) {
            $response = [
                'user_message' => "Erro no registro de usuário",
            ];
            $status = 500;
        }

        return response()->json($response, $status);
    }

    public function login(LoginRequest $request)
    {
        $request->validate(User::rulesLogin());

        $data = $request->all();

        $user = User::query()->where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            $response = [
                'message' => 'Credenciais inválidas'
            ];
            return response()->json($response, 401);
        }

        $token = $user->createToken('token_'.strtolower($user->name))->plainTextToken;

        $response = [
            'message' => 'Login realizado com sucesso',
            'user' => $user,
            'token' => $token,
        ];

        return response()->json($response, 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        $response = [
            'message' => 'Logout realizado com sucesso'
        ];

        return response()->json($response, 200);
    }
}
