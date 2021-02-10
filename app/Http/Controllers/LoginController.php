<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function google()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function googleRedirect()
    {
        $gglUser = Socialite::driver('google')->user();
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
