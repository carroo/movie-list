<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Gr;
use App\Models\Movie;
use App\Models\WatchList;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $f = 1;
        $g = 0;
        $movies = Movie::get();
        if ($request->filter) {
            $f = $request->filter;
        }
        if ($request->gr && $request->gr != 0) {
            $g = $request->gr;
        }
        if ($g != 0) {
            if ($f == 1) {
                $movies = Movie::join('genres','movies.id','movie_id')->where('gr_id',$g)->orderBy('release_date', 'desc')->get();
            } else if ($f == 2) {
                $movies = Movie::join('genres','movies.id','movie_id')->where('gr_id',$g)->orderBy('title', 'asc')->get();
            } else if ($f == 3) {
                $movies = Movie::join('genres','movies.id','movie_id')->where('gr_id',$g)->orderBy('title', 'desc')->get();
            }
        } else {
            if ($f == 1) {
                $movies = Movie::orderBy('release_date', 'desc')->get();
            } else if ($f == 2) {
                $movies = Movie::orderBy('title', 'asc')->get();
            } else if ($f == 3) {
                $movies = Movie::orderBy('title', 'desc')->get();
            }
        }
        if($request->key){
            $movies = Movie::where('title','like','%'.$request->key.'%')->get();
        }

        $random = Movie::inRandomOrder()->take(2)->get();
        $popular = Movie::withCount('watch_list')->orderBy('watch_list_count', 'desc')->get();
        $gr = Gr::get();
        return view('home', [
            'random' => $random,
            'popular' => $popular,
            'gr' => $gr,
            'f' => $f,
            'g' => $g,
            'movies' => $movies
        ]);
    }
    public function movies(Request $request)
    {

        $f = 1;
        $g = 0;
        $movies = Movie::get();
        if ($request->filter) {
            $f = $request->filter;
        }
        if ($request->gr && $request->gr != 0) {
            $g = $request->gr;
        }
        if ($g != 0) {
            if ($f == 1) {
                $movies = Movie::join('genres','movies.id','movie_id')->where('gr_id',$g)->orderBy('release_date', 'desc')->get();
            } else if ($f == 2) {
                $movies = Movie::join('genres','movies.id','movie_id')->where('gr_id',$g)->orderBy('title', 'asc')->get();
            } else if ($f == 3) {
                $movies = Movie::join('genres','movies.id','movie_id')->where('gr_id',$g)->orderBy('title', 'desc')->get();
            }
        } else {
            if ($f == 1) {
                $movies = Movie::orderBy('release_date', 'desc')->get();
            } else if ($f == 2) {
                $movies = Movie::orderBy('title', 'asc')->get();
            } else if ($f == 3) {
                $movies = Movie::orderBy('title', 'desc')->get();
            }
        }
        if($request->key){
            $movies = Movie::where('title','like','%'.$request->key.'%')->get();
        }
        $gr = Gr::get();
        return view('movie.movies', [
            'gr' => $gr,
            'f' => $f,
            'g' => $g,
            'movies' => $movies
        ]);
    }
    public function movie_detail($id)
    {
        $data = Movie::where('id',$id)->first();
        return view('movie.detail',[
            'data' => $data,
            'movies' => Movie::inRandomOrder()->take(4)->get()
        ]);
    }
    public function actor_detail($id)
    {
        $data = Actor::where('id',$id)->first();
        return view('actor.detail',[
            'data' => $data,
        ]);
    }
    public function actors(Request $request)
    {
        $actor = Actor::paginate(8);
        if($request->key){
            $actor = Actor::where('name','like','%'.$request->key.'%')->paginate(8);
        }
        return view('actor.actors',[
            'actors' => $actor
        ]);
    }
}
