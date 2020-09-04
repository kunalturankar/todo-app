<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;

class UserController extends Controller
{
    //
    public function uploadAvatar(Request $request)
    {
        # code...
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            if (auth()->user()->avatar) {
                # code...
                Storage::delete('/public/images'.auth()->user()->avatar);
            }
            $request->image->storeAs('images',$filename,'public');
            auth()->user()->update(['avatar'=>$filename]);
            //$request->session()->flash('message','Image Uploaded');
            return redirect()->back()->with('message','Image Uploaded');
        }
        
        return redirect()->back()->with('error','Image not Uploaded');

    }

    public function index()
    {
       //db::insert('insert into users (name,email,password) values(?,?,?)',['Kunal','kunalgturankar@gmail.com','password']);//
    //    db::delete('delete from users where id=1');
    //     $users=db::select('select * from users');
    //     return $users;
    //            return view('home');
            // $user = new User();
            // $user->name="kunal";
            // $user->email="kunalgturankar@gmail.com";
            // $user->password=bcrypt('password');
            // $user->save();
            $users=USER::all();
             return $users;
    }
}
