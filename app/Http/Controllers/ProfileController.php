<?php

namespace App\Http\Controllers;

use App\User;
use Gate;
use Request;
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
        $user_id = Request::input('user_id');
        $user = User::find($user_id);

        if($user_id == null) {
            $user = Auth::user();
        }

        //Preventing Breaking Access Controll 
        $authenticated_user = Auth::user();
        if ($authenticated_user->id != $user->id) {
            return 'Unauthorised';
        }

        if ($user) {
            $user->update($this->validateData());

            return redirect('/profile');
        }
        else {
            return 'no user found';
        }
    }

    public function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
    }
}
