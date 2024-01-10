<?php

namespace App\Http\Controllers\Auth;

use App\Profile;
use App\SocialAccount;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Soc;


class SocialLoginController extends Controller
{
    public function redirectToProvider(Request $request)
    {
        return Socialite::driver($request->provider)->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        $user = $this->createOrGetUser(Socialite::driver($request->provider)->user(),$request->provider);
        auth()->login($user);

        return redirect()->to('/dashboard');
    }




    public function createOrGetUser(ProviderUser $providerUser,$provider)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
                $user->assignRole('user');
                if($user->profile == null){
                    $profile = new Profile();
                    $profile->user_id = $user->id;
                    $profile->save();
                }
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }

    protected function sendSuccessResponse()
    {
        return Redirect::route('dashboard')->withInput()->with('success', 'Please update Password');
    }
}
