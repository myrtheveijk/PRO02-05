<?php

namespace App\Http\Controllers;

use App\Spot;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class SpotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index(Spot $spots)
    {
        $spots;
        $user = Auth::user();

        if ($user->roles()->first()->name == 'admin') {
            $spots = Spot::all();
        } else {
            $spots = $user->spots();
        }

        return view('spot.index', ['spots' => $spots]);
    }

    public function create()
    {
        $spot = new Spot();

        return view('spot.create', compact('spot'));
    }

    public function store(Request $request)
    {
        $toggleValue = 0;
        if($request->input('visible') == 'on'){
            $toggleValue = 1;
        }

        $validatedData = request()->validate([
            'name' => 'required', 
            'location' => 'required', 
            'region' => 'required',
            'image' => ['required', 'image'],
            'website' => 'required'
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        //$data['user_id'] = auth()->user()->id;

        //Spot::create($data);
        Spot::create([
            'name' => $validatedData['name'],
            'location' => $validatedData['location'],
            'region' => $validatedData['region'],
            'image' => $imagePath,
            'website' => $validatedData['website'],
            'visible' => $toggleValue,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/spots');
    }

    public function show(Spot $spot)
    {
        //return view('spot.show', compact('user'));
        $spots = Spot::where('user_id', '=', Auth::id())->get();
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
        $spot->image = $request->input('image');
        $spot->website = $request->input('website');
        $spot->visible = $request->input('visible');
        $spot->save();

        return Redirect::to('spots');
    }

    public function destroy(Spot $spot)
    {
        $spot->delete();

        return redirect('/spots');
    }
}
