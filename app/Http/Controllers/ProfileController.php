<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();
        $preference = $user->preference()->firstOrCreate([]);

        return view('profile.edit', compact('user', 'preference'));
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $preference = $user->preference()->firstOrCreate([]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        ]);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $preference->update([]);

        $this->logActivity('profile_update', 'Memperbarui profil dan preferensi.');

        return back()->with('status', 'Profil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'confirmed', 'min:8'],
        ]);

        if (! Hash::check($data['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Kata sandi lama tidak sesuai.']);
        }

        $user->update(['password' => $data['new_password']]);

        $this->logActivity('password_update', 'Mengubah kata sandi akun.');

        return back()->with('status', 'Kata sandi berhasil diperbarui.');
    }
}
