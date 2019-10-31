<?php

namespace App\Http\Controllers;
use App\Spot;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        if(request()->has('region')){
            $spots = Spot::where('region', request('region'))->paginate(6)->appends('region', request('region'));
        }else{
            $spots = Spot::paginate(6);
        }

        return view('welcome', compact('spots'));
    }
}
