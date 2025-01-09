<?php

namespace App\Http\Controllers;

use App\Models\Role\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.register-customer');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Gunakan "password_confirmation" pada form
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()
                ->withErrors($validator) // Kirim error validasi ke view
                ->withInput(); // Kirim input kembali ke form
        }

        try {
            $role = Role::where('role_name', 'user')->first();
            // // Simpan user ke database
            User::create([
                'name' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Enkripsi password
                'role_id' => $role->id
            ]);

            // // Redirect dengan pesan sukses
            return redirect()->route('register-area.index')->with('success', 'User registered successfully. Please login.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return back()->with('error', 'Registration failed. Please try again later. ' . $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
