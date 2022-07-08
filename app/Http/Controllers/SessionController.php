<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function index()
    {
        return view('session.index');
    }
    public function store(Request $request)
    {
        if(! auth()->attempt(request(['username','password']))){
            return back();
        }
        return redirect('user.index');
    }
}
