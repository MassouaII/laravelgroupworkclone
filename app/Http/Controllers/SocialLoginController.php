<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    //
    public function redirectToProvider(string $provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(string $provider): RedirectResponse{
        try {
            $socialUser = Socialite::driver($provider)->user();
            $user =$this->findOrCreateUser($socialUser, $provider);

            auth()->login($user, true);
            return redirect()->intended('/dashboard');
        }catch (\Exception $e){
            //Handle the exception, e.g., log the error
            Log::error('Social Login Error: ' /$e->getMessage());
            return redirect()->route('login')->withErrors(['error'=> 'An error occurred during social login.']);
        }


        // First Find Social Account

    }
    protected function findOrCreateUser($socialUser, $provider){
        $socialAccount = SocialAccount::where([
            'provider_name'=> $provider,
            'provider_id'=> $socialUser->getId(),
        ])->first();

        if ($socialAccount){
            // If the social account exists, return the associated user
            return $socialAccount->user;
        }
        // Find the user by email and social provider

        $user = User::where('email')
            ->where('social_provider', $provider)
            ->first();

        if (!$user){
            $user = User::create([
                'email'=>$socialUser->getEmail(),
                'name'=>$socialUser->getName(),
                'password'=> Hash::make(Str::random(16)),// Generate a secure random password
                'social_provider'=>$provider,
            ]);
        }
        // Create Social Accounts
        $user->socialAccounts()->create([
            'provider_id'=>$socialUser->getId(),
            'provider_name'=>$provider,

        ]);
        return $user;
    }

}
