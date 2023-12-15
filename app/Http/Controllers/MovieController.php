<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Character;
use App\Models\Genre;
use App\Models\Gr;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
    }
    public function form()
    {
        return view('movie.form', [
            'grs' => Gr::get(),
            'actors' => Actor::get()
        ]);
    }
    public function add(Request $request)
    {
        if ($request->id) {
            $request->validate([
                'title' => 'required|min:2|max:50',
                'description' => 'required|min:8',
                'director' => 'required|min:3',
                'release_date' => 'required',
            ]);
            $movie = Movie::where('id', $request->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'director' => $request->director,
                'release_date' => date('Y-m-d', strtotime($request->release_date)),
            ]);
            Character::where('movie_id',$request->id)->delete();
            Genre::where('movie_id',$request->id)->delete();
            foreach ($request->actor_id as $key => $value) {
                Character::create([
                    'actor_id' => $value,
                    'movie_id' => $request->id,
                    'play_as' => $request->play_as[$key]
                ]);
            }
            foreach ($request->genre as $key => $value) {
                Genre::create([
                    'gr_id' => $value,
                    'movie_id' => $request->id,
                ]);
            }
            if ($request->thumbnail) {
                $request->validate([
                    'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                $thumbnail = time() . '.' . $request->thumbnail->getClientOriginalExtension();
                $request->thumbnail->move(public_path('images/thumbnail'), $thumbnail);
                Movie::where('id', $request->id)->update([
                    'thumbnail' => $thumbnail,
                ]);
            }
            if ($request->background) {
                $request->validate([
                    'background' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                $background = time() . '.' . $request->background->getClientOriginalExtension();
                $request->background->move(public_path('images/background'), $background);
                Movie::where('id', $request->id)->update([
                    'background' => $background
                ]);
            }

            return redirect()->route('movie_detail', $request->id);
        } else {
            $request->validate([
                'title' => 'required|min:2|max:50',
                'description' => 'required|min:8',
                'director' => 'required|min:3',
                'release_date' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'background' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $thumbnail = time() . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('images/thumbnail'), $thumbnail);
            $background = time() . '.' . $request->background->getClientOriginalExtension();
            $request->background->move(public_path('images/background'), $background);

            $movie = Movie::create([
                'title' => $request->title,
                'description' => $request->description,
                'director' => $request->director,
                'release_date' => date('Y-m-d', strtotime($request->release_date)),
                'thumbnail' => $thumbnail,
                'background' => $background
            ]);
            foreach ($request->actor_id as $key => $value) {
                Character::create([
                    'actor_id' => $value,
                    'movie_id' => $movie->id,
                    'play_as' => $request->play_as[$key]
                ]);
            }
            foreach ($request->genre as $key => $value) {
                Genre::create([
                    'gr_id' => $value,
                    'movie_id' => $movie->id,
                ]);
            }

            return redirect()->route('movie_detail', $movie->id);
        }
    }
    public function delete($id)
    {
        Movie::find($id)->delete();
        return back();
    }
    public function edit($id)
    {
        return view('movie.form', [
            'grs' => Gr::get(),
            'actors' => Actor::get(),
            'data' => Movie::where('id', $id)->first()
        ]);
    }
}
