<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books', ['books' => $books]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
        ]);

        //@todo: meilleure validation
        $book = new Book();
        $book->title = $request->input('title');
        $book->description = $request->input('description');

        if (!$book->save()) {
            return redirect()->back()->with('error', 'Failed to save the book');
        }

        return redirect()->back()->with('success', 'The book was created');
    }

    public function find($id)
    {
        $book = Book::find($id);
        return view('book', ['book' => $book]);
    }

    public function user_list() {
        $user = auth()->user(); //@todo: être sur que l'utilisateur est connecté
        $books = Book::all();
        $user_books = $user->book;

        return view('user.my-books', ['books' => $books, 'user_books' => $user_books]);
    }

    public function add_book_user(Request $request) {
        $user = auth()->user(); //@todo: être sur que l'utilisateur est connecté
        $book = Book::find($request->input('book'));

        $user->book()->attach($book);
        return redirect()->back()->with('success', 'The book was succesfully added');
    }

}
