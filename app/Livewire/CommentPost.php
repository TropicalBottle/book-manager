<?php

namespace App\Livewire;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class CommentPost extends Component
{
    public int $rating;
    public string $review;
    public int $user_id;
    public int|null $book_id;

    public function mount(Request $request) {
        $this->rating = 3;
        $this->user_id = Auth::id();
        $this->book_id = Route::current()->parameter('id');
    }

    public function render()
    {
        return view('livewire.comment-post');
    }

    public function postComment()
    {
        $selected_rating = $this->rating;
        $review_content = $this->review;
        $id_book = $this->book_id;
        $id_user = $this->user_id;

        $review = new Review();
        $review->review_amount = $selected_rating;
        $review->review_content = $review_content;
        $review->user_id = $id_user;
        $review->book_id = $id_book;
        if ($review->save()) {
            return redirect()->route('book-detail', ['id' => $id_book]);
        } else {
            return redirect()->back()->with('error-review', 'The review was not sent');
        }
    }
}
