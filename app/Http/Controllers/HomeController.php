<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Events\NewMessages;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = User::where('id','!=',auth()->user()->id)->get();
        return view('home',compact('user'));
    }

    public function chat($id = null){
      if(auth()->user()->id != $id && $id != null){
        $user = User::find($id);
         return view('chat',compact('user'))->with('msg','hey');
      }
      return back();

    }

    public function send(Request $request){

      event(new NewMessages(auth()->user()->id,$request->id,$request->message, Carbon::now()));
      return response()->json($request->id);
    }
}
