<?php

namespace App\Http\Controllers;

use App\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function index()
    {
        $spots = Spot::all();
        return view('spot.index', compact('spots'));
    }


    public function create()
    {
        $spot = new Spot();

        return view('spot.create', compact('spots'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required', 
            'location' => 'required', 
            'region' => 'required'
        ]);

        Spot::create($data);

        return redirect('/spots');
    }
}
