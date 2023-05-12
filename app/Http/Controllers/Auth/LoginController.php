<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\UpdateUserInfoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->route('dashboard');
        }

        return back();
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()
            ->route('login');
    }

    public function updateUser(UpdateUserInfoRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();
        $data['avatar'] = $user->avatar;

        if ($request->hasFile('avatar')) {
            Storage::disk('public')->delete($user->avatar);
            $imagePath = $request->file('avatar')->store('profile-photos', 'public');
            $data['avatar'] = $imagePath;
        }

        $user->update($data);
    }
}
