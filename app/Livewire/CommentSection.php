<?php

namespace App\Livewire;

use App\Models\Review;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class CommentSection extends Component
{
    public $reviews;
    public $id_book;

    public function mount($reviews) {
        $this->reviews = $reviews;
        $this->id_book = Route::current()->parameter('id');
    }

    public function render()
    {
        return view('livewire.comment-section', ['reviews' => $this->reviews]);
    }

    public function deleteReview($review_id) {
        Review::destroy($review_id);
        return redirect()->route('book-detail', ['id' => $this->id_book]);
    }
}
