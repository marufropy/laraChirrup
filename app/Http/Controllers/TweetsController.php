<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetsController extends Controller
{
    public function store()
    {
        $attributes = request()->validate(['body' => 'required|max:50']);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect('/home');
    }
}
