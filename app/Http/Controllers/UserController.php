<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
     /**
     * Show the form for editing the user.
     *
     * @param  \App\User  $book
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('user.edit')->with('user', $user);
        }
    }

    public function update($request)
    {
        
    }

    public function changePassword($request)
    {
        
    }


}
