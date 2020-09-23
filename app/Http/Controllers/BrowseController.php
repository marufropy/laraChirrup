<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class BrowseController extends Controller
{
    public function index()
    {
        return view('browse', [
            'users' => User::paginate(50)
        ]);
    }
}
