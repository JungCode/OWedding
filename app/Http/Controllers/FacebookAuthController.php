<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callbackFacebook()
    {
        try {
            $facebook_user = Socialite::driver('facebook')->user();
            $user = User::where('google_id', $facebook_user->getId())->first();
            if (!$user) {
                $new_user = new User;
                $new_user->name = $facebook_user->getName();
                $new_user->email = $facebook_user->getEmail();
                $new_user->google_id = $facebook_user->getId();
                $new_user->save();
                Auth::login($new_user);
                session(['user' => $new_user]);
                return redirect()->route('users.index');
            } else {
                Auth::login($user);
                session(['user' => $user]);
                return redirect()->route('users.index');
            }
        } catch (\Throwable $th) {
            dd('something went wrong' . $th->getMessage());
        }
    }
}
