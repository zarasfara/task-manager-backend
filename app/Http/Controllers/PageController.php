<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home()
    {
        return Inertia::render('Index');
    }

    public function login()
    {
        return Inertia::render('Login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function projects()
    {
        return Inertia::render('Projects');
    }

    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function users(): \Inertia\Response|\Inertia\ResponseFactory
    {
        $users = User::with('role')
            ->select('id', 'name', 'avatar', 'email', 'nickname', 'role_id', 'surname')
            ->get();
        return Inertia::render('Users', compact('users'));
    }

    /**
     * return DashBoard page
     *
     * @return \Inertia\Response
     */
    public function dashBoard()
    {
        $user = Auth::user();
        $user['avatar'] = asset('storage/' . $user->avatar);
        return Inertia::render('DashBoard', compact('user'));
    }
}
