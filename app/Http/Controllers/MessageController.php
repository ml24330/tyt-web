<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class MessageController extends Controller
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
    public function index($message_id)
    {
        $message = (Message::findOrFail($message_id));
        if($message->user_id == auth()->user()->id || $message->user_id == 67){
            return view('message', [
                'message' => $message
            ]);
        }else{
            return view('error');
        }

    }

    public function download()
    {
        if(!auth()->user()==null){
            $user = auth()->user();
            $global_messages = Message::all()->where('user_id', 67);
            $data = ['user'=>$user, 'global_messages'=>$global_messages];
            $pdf = \PDF::loadView('download', compact('data'));
            return $pdf->download('messages.pdf');
        }else{
            return view('error');
        }
    }

    public function test()
    {
        $user = auth()->user();
        $global_messages = Message::all()->where('user_id', 67);
        $data = ['user'=>$user, 'global_messages'=>$global_messages];
        return view('download', [
            'data' => $data
        ]);
    }
}
