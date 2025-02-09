<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        // dd('RegisteredUserController');
        return view('auth.register');
    }

    public function store()
    {
        try {
            $attributes = request()->validate([
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required', 'email'],
                // 'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
                'password' => ['required'],
            ]);
            // todo log
            file_put_contents(storage_path('logs/laravel.log'), '');
            Log::info('RegisteredUserController:');
            Log::info($attributes);
            // User::create([
            //     'first_name' => request('first_name'),
            //     'last_name' => request('last_name'),
            //     'email' => request('email'),
            //     'password' => bcrypt(request('password')),
            // ]);
            $user = User::create($attributes);
            Auth::login($user);

            return redirect('/jobs');
        } catch (\Exception $e) {
            // todo log
            file_put_contents(storage_path('logs/laravel.log'), '');
            Log::error('RegisteredUserController:');
            Log::error(request()->all());
            Log::error($e->getMessage());
        }
    }
}
