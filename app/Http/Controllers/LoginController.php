<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        $fbUser = Socialite::driver('facebook')->user();
        $user = User::firstOrCreate([
            'email' => $fbUser->email,
        ], [
            'name' => $fbUser->name,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user, true);
        return redirect(route('dashboard'));
    }
}
