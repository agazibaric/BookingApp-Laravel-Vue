<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $books = Book::get();
            $loggedUser = Auth::id();
            return view('book.index')
            ->with('books', $books)
            ->with('loggedUser', $loggedUser)
            ->with('title', 'All books');;
        }
        return redirect('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('book.create');
        }
        return redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            // The user is logged in...
            
            // Validate book fields
            $request->validate([
                'title' => 'required|max:255',
                'author' => 'required|max:255'
            ]);

            // Create a new Book
            $book = new Book();
            $book->title = $request['title'];
            $book->author = $request['author'];
            $book->user_id = Auth::id();
            $book->save();
        }
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

     /**
     * Display a listing of the available books.
     *
     * @return \Illuminate\Http\Response
     */
    public function available()
    {
        if (Auth::check()) {
            $loggedUser = Auth::id();

            // Get all books that logged user can book
            $books = DB::table('books')
            ->whereNull('user_booked_id')
            ->whereNotIn('user_id', [$loggedUser])->get();
            
            return view('book.index')
            ->with('books', $books)
            ->with('loggedUser', $loggedUser)
            ->with('title', 'Available books');;
        }
        return redirect('home');
    }

    /**
     * Display a listing of the user's books.
     *
     * @return \Illuminate\Http\Response
     */
    public function myBooks()
    {
        if (Auth::check()) {
            // Get all books that belongs to the logged user
            $loggedUser = Auth::id();
            $userBooks = DB::table('books')->where('user_id', Auth::id())->get();
            return view('book.index')
            ->with('books', $userBooks)
            ->with('loggedUser', $loggedUser)
            ->with('title', 'My books');;
        }
        return redirect('home');
    }

    /**
     * Display a listing of the booked books by logged user
     *
     * @return \Illuminate\Http\Response
     */
    public function bookedBooks() {
        if (Auth::check()) {
            // Get all books that are booked by the logged user
            $loggedUser = Auth::id();
            $bookedBooks = DB::table('books')->where('user_booked_id', Auth::id())->get();
            return view('book.index')
            ->with('books', $bookedBooks)
            ->with('loggedUser', $loggedUser)
            ->with('title', 'Booked books');
        }
        return redirect('home');
    }

    /**
     * For booking a book call this method with bookID as parameter.
     */
    public function bookABook($bookId) {
        if (Auth::check()) {
            DB::table('books')
              ->where('id', $bookId)
              ->update(['user_booked_id' => Auth::id()]);
        }
        return redirect('home');
    }

    /**
     * For returning a book that logged user have booked.
     */
    public function returnABook($bookId) {
        // Find book with given id and set user that booked it to null
        if (Auth::check()) {
            DB::table('books')
              ->where('id', $bookId)
              ->update(['user_booked_id' => null]);
        }
        return redirect('home');
    }
}
