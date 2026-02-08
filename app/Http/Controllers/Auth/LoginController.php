<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Email atau password salah'
            ])->withInput();
        }

        Auth::login($user);

        return match ($user->role) {
            'admin'    => redirect()->route('admin.dashboard'),
            'officer'  => redirect()->route('officer.dashboard'),
            'borrower' => redirect()->route('borrower.dashboard'),
            default    => abort(403),
        };
    }
}
