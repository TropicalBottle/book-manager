<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
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
        $is_already_to_library = false;
        if (auth()->user()) {
            $user = auth()->user();

            if ($user && $book && $user->book->contains($book)) {
                $is_already_to_library = true;
            }
        }

        return view('book', ['book' => $book, 'already_to_library' => $is_already_to_library, 'reviews' => Review::where('book_id', $id)->get()]);
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
        if (auth()->user()) {
            $user = auth()->user();
        } else {
            return redirect()->back()->with('error', 'You need to be connected to add a book to your library');
        }

        $book = Book::find($request->input('book'));

        if ($user && $book && $user->book->contains($book)) {
            return redirect()->back()->with('error', 'You already added the book to your library');
        }

        $user->book()->attach($book);
        return redirect()->back()->with('success', 'The book was succesfully added');
    }

    public function remove_book_library(Request $request)
    {
        if (auth()->user()) {
            $user = auth()->user();
        } else {
            return redirect()->back()->with('error', 'You need to be connected to add a book to your library');
        }

        $book = Book::find($request->input('book'));
        $user->book()->detach($book);
        return redirect()->route('my-books')->with('success', 'The book was succesfully removed');
    }
}
