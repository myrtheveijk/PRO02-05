<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Spot;

class SearchController extends Controller
{
    public function index()
    {
        $search = Request::get('search');
        $spot = Spot::where('name', 'like', '%'.$search.'%')->orWhere('location', 'like', '%'.$search.'%')->orWhere('region', 'like', '%'.$search.'%')->get();

        if(count($spot) > 0){
            return view('search')->withDetails($spot)->withQuery($search);
        }else{
            return view('search', ['errorMessage' => 'Jammerjoh! Er zijn geen spots']);
        }
    }
}
