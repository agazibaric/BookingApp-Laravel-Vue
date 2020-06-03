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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $userBooks = DB::table('books')->where('user_id', Auth::id())->get();
            return view('user.index')->with('userBooks', $userBooks);
        }
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function bookedBooks() {
        if (Auth::check()) {
            $bookedBooks = DB::table('books')->where('user_booked_id', Auth::id())->get();
            return view('user.bookedBooks')->with('bookedBooks', $bookedBooks);
        }
    }

    public function bookABook($bookId) {
        print("Hello World");
        if (Auth::check()) {
            DB::table('books')
              ->where('id', $bookId)
              ->update(['user_booked_id' => Auth::id()]);
            
        }
    }


}
