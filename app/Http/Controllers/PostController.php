<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        $users = User::select('id','username')->get();
        return view('create', [
            'users' => $users
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'user_id' => 'required',
            'owner_name' => 'required',
            'title' => '',
            'body' => 'required',
            'image' => 'image'
        ]);

        if(!request('image')==null){
            $imagePath = request('image')->move('storage',request('image')->getClientOriginalName());

            \App\Message::create([
                'user_id' => $data['user_id'],
                'owner_name' => $data['owner_name'],
                'title' => $data['title'],
                'body' => $data['body'],
                'image' => $imagePath
            ]);
        }else{
            \App\Message::create($data);
        }

        return redirect('/success');
    }
}
