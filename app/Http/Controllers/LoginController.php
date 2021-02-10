<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        $gglUser = Socialite::driver('facebook')->user();
        $user = User::firstOrCreate([
            'email' => $gglUser->email,
        ], [
            'name' => $gglUser->name,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user, true);
        return redirect(route('dashboard'));
    }
}
