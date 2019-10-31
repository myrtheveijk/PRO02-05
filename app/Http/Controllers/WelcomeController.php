<?php

namespace App\Http\Controllers;
use App\Spot;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $spots = Spot::all();

        return view('welcome', compact('spots'));
    }
}
