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
        $randMovie->play_counter ++;
        $randMovie->save();

        return back()->with('random', $randMovie);
    }

    public function counter(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $order = $request->counter;
        switch ($order){
            case 'plus':
                $movie->play_counter ++;
                break;
            case 'minus':
                $movie->play_counter --;
                break;
            default:
                return route('list');
        }
        $movie->save();
        return back();
    }
}
