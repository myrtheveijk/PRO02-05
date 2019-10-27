<?php

namespace App\Http\Controllers;

use App\Spot;
use Illuminate\Http\Request;
use Redirect;

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

        return view('spot.create', compact('spot'));
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

    public function show(Spot $spot)
    {
        return view('spot.show', compact('spot'));
    }

    public function edit(Spot $spot)
    {
        return view('spot.edit', compact('spot'));
    }

    public function update(Request $request, Spot $spot)
    {
        $spot->name = $request->input('name');
        $spot->location = $request->input('location');
        $spot->region = $request->input('region');
        $spot->save();

        return Redirect::to('spots');
    }

    public function destroy(Spot $spot)
    {
        $spot->delete();

        return redirect('/spots');
    }
}
