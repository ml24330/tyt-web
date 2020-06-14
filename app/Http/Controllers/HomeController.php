<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {
        $user = (User::findOrFail($user));
        $global_messages = Message::all()->where('user_id', 67);

        if($user->id == auth()->user()->id){
            return view('home', [
                'user' => $user,
                'global_messages' => $global_messages
            ]);
        }else{
            return view('error');
        }
    }
}
