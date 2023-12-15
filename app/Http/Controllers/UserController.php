<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WatchList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class UserController extends Controller
{
    public function watch_lists()
    {
        $wl = WatchList::where('user_id', auth()->user()->id)->get();
        return view('watch_list.watch_lists', [
            'watch_lists' => $wl
        ]);
    }
    public function watch_lists_add($id)
    {
        $check = WatchList::where('movie_id', $id)->where('user_id', auth()->user()->id)->first();
        if ($check) {
            WatchList::where('id', $check->id)->delete();
        } else {
            WatchList::create([
                'movie_id' => $id,
                'user_id' => auth()->user()->id,
                'status' => "Planning"
            ]);
        }
        return back();
    }
    public function watch_lists_update(Request $request)
    {
        if($request->status == "Remove"){
            WatchList::where('id',$request->id)->delete();
        }else{
            WatchList::where('id',$request->id)->update([
                "status" => $request->status
            ]);
        }
        return back();
    }
    public function profile()
    {
        $data = Auth::user();
        return view('profile.profile',[
            'data' => $data,
        ]);
    }
    public function profile_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'phone' => 'required|min:5|max:13',
        ]);
        User::where('id',Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'phone' => $request->phone,
        ]);
        if($request->image){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/user'), $image);
            User::where('id',Auth::user()->id)->update([
                'image' => $image,
            ]);
        }
        return back();
    }
}
