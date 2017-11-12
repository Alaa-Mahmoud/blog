<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
     public function getIndex(){
         //Fetch posts & messages
          $posts =Post::orderBy('created_at','desc')->take(3)->get();
         return view('admin.index',compact('posts'));
     }

     public function getLogin(){

          return view('admin.login');
     }

    public function posLogin(Request $request){
       $this->validate($request,[
           'email'=>'required|email',
           'password'=>'required'
       ]);

        if(!Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->back()->with(['fail'=>'You Can not Login']);
        }

        return redirect()->route('admin.index');
    }

     public function logOut(){
         Auth::logout();

         return redirect()->route('blog.index');
     }

}
