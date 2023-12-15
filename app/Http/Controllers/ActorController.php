<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
    }
    public function form()
    {
        return view('actor.form');
    }
    public function add(Request $request)
    {
        if ($request->id) {
            $request->validate([
                'name' => 'required|min:3',
                'gender' => 'required',
                'biography' => 'required|min:3',
                'dob' => 'required',
                'pob' => 'required',
                'popularity' => 'required|numeric',
            ]);
            $actor = Actor::where('id', $request->id)->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'biography' => $request->biography,
                'dob' => $request->dob,
                'pob' => $request->pob,
                'popularity' => $request->popularity,
            ]);
            if ($request->image) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                $image = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/actors'), $image);
                Actor::where('id', $request->id)->update([
                    'image' => $image,
                ]);
            }

            return redirect()->route('actor_detail', $request->id);
        } else {
            $request->validate([
                'name' => 'required|min:3',
                'biography' => 'required|min:10',
                'gender' => 'required',
                'dob' => 'required',
                'pob' => 'required',
                'popularity' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/actors'), $image);

            $actor = Actor::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'biography' => $request->biography,
                'dob' => $request->dob,
                'pob' => $request->pob,
                'popularity' => $request->popularity,
                'image' => $image
            ]);

            return redirect()->route('actor_detail', $actor->id);
        }
    }
    public function delete($id)
    {
        Actor::find($id)->delete();
        return redirect()->route('actors');
    }
    public function edit($id)
    {
        return view('actor.form', [
            'data' => Actor::where('id', $id)->first()
        ]);
    }
}
