<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required',
            'role' => 'required|in:guru_bk,siswa',
            'NIP' => 'nullable|required_if:role,guru_bk|unique:users',
        ]);

        // Buat user baru berdasarkan data yang diterima
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->NIP = $request->NIP;
        $user->save();

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
