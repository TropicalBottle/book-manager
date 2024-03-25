<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getReviews()
    {
        return Review::all();
    }

    public function getReviewsForBook($book_id) {
        return Review::where('book_id', $book_id)->get();
    }
}
