<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nip' => 'required|digits:18|size:18',
            'password' => 'required|string|max:50',
        ]);

        $users = Users::where('nip', $request->nip)->first();

        if ($users && Hash::check($request->password, $users->password)) {
            Auth::login($users);

            // Arahkan ke dashboard tanpa membedakan role
            return redirect()->route('konten.dashboard'); // Ganti dengan route dashboard yang sesuai
        }

        return back()->with('error', 'NIP atau password salah');
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.index');
    }
}
