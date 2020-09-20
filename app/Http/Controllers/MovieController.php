<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::query()->paginate(15);
        return view('list', compact('movies'));
    }

    public function new(Request $request)
    {
        $request->validate([
            'name' => 'string|min:5|max:60'
        ]);

        Movie::create([
            'name' => $request->name
        ]);

        return back();
    }

    public function remove($id)
    {
        $movie = Movie::query()->findOrFail($id);
        $movie->delete();
        return back();
    }

    public function random()
    {
        $randMovieID = Movie::all()->random(1)->toArray();
        $movieID = $randMovieID[0]['id'];
        $randMovie = Movie::query()->findOrFail($movieID);
        $randMovie->play_counter++;
        $randMovie->save();

        return back()->with('random', $randMovie);
    }
}
