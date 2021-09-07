<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponser;


    public  function index()
    {
        $data = Auth::user();
        return response()->json(compact(['data']),'201');
    }

    public function store(request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:2'
        ]);

        if (!Auth::attempt($attributes)) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

/*
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:2'
        ]);

        $user = User::create([
            'name' => $attributes['name'],
            'password' => Hash::make($attributes['password']),
            'email' => $attributes['email']
        ]);

        return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken,
            $user->tokens,

        ],null,201);
    }*/

    public function destroy(request $request)
    {

        auth()->user()->tokens()->delete();

        return $this->success('','User successfully signed out',201);
    }
}
