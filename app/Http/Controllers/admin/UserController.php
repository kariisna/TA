<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user', ['users' => $users]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'role' => 'required|in:admin,teacher,student',
                'kelas' => 'nullable|string|max:255',
                'no_hp' => 'nullable|string|max:15'
            ]);

            $user = User::create([
                'username' => $validated['username'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'],
                'kelas' => $request->input('kelas'),
                'no_hp' => $request->input('no_hp')
            ]);

            return redirect()->route('admin.user')->with('success', 'Pengguna berhasil ditambahkan');
        } catch (\Throwable $e) {
            Log::error('Gagal menambahkan pengguna: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat menambahkan pengguna.');
        }
    }

    public function update(Request $request, User $user)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string', 
                    'email', 
                    'max:255',
                    Rule::unique('users')->ignore($user->id)
                ],
                'kelas' => 'nullable|string|max:255',
                'no_hp' => 'nullable|string|max:15',
                'role' => 'required|in:admin,teacher,student',
                'password' => 'nullable|string|min:8'
            ]);

            $user->name = $validated['name'];
            $user->username = $validated['username'];
            $user->email = $validated['email'];
            $user->role = $validated['role'];
            $user->kelas = $request->input('kelas');
            $user->no_hp = $request->input('no_hp');

            if ($request->filled('password')) {
                $user->password = Hash::make($validated['password']);
            }

            $user->save();

            return redirect()->route('admin.user')->with('success', 'Pengguna berhasil diperbarui');
        } catch (\Throwable $e) {
            Log::error('Gagal memperbarui pengguna: ' . $e->getMessage(), [
                'user_id' => $user->id,
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat memperbarui pengguna.');
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('admin.user')->with('success', 'Pengguna berhasil dihapus');
        } catch (\Throwable $e) {
            Log::error('Gagal menghapus pengguna: ' . $e->getMessage(), [
                'user_id' => $user->id,
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat menghapus pengguna.');
        }
    }
}
