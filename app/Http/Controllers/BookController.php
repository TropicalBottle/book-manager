<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books', ['books' => $books]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]) ;

        if ($validator->fails()) {
          if (!$request->input('title')) {
              return redirect()->back()->with('error', 'You need to add a title');
          } else {
              return redirect()->back()->with('error', 'An error occured');
          }
        }

        $book = new Book();
        $book->title = $request->input('title');
        $book->description = $request->input('description');

        if ($book->save()) {
            return redirect()->back()->with('success', 'The book was created');
        }

        return redirect()->back()->with('error', 'Failed to save the book');
    }

    public function find($id)
    {
        $book = Book::find($id);
        return view('book', ['book' => $book]);
    }

    public function user_list() {
        if (auth()->user()) {
            $user = auth()->user(); //@todo: être sur que l'utilisateur est connecté
            $books = Book::all();
            $user_books = $user->book;

            return view('user.my-books', ['books' => $books, 'user_books' => $user_books]);
        }

        return redirect()->back()->with('error', 'You need to be connected to see that page');
    }

    public function add_book_user(Request $request) {
        $user = auth()->user(); //@todo: être sur que l'utilisateur est connecté
        $book = Book::find($request->input('book'));

        $user->book()->attach($book);
        return redirect()->back()->with('success', 'The book was succesfully added');
    }

}
