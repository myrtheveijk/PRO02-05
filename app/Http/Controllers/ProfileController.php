<?php

namespace App\Http\Controllers;

use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = Auth::user()->id;
        $profile = User::findOrFail($userId);

        return view('profile.index', ['profile' => $profile]);
    }

    public function edit(User $user)
    {
        $userId = Auth::user()->id;
        $profile = User::findOrFail($userId);

        if(Gate::denies('edit-users')){
            return view('profile.edit', compact('profile'));
        }
    }

    public function update()
    {
        $userId = Auth::user()->id;
        $profile = User::findOrFail($userId);

        $profile->update($this->validateData());

        return redirect('/profile');
    }

    public function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
    }
}
