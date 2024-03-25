<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'review_amount',
        'review_content',
        'is_public'
    ];

    public function user(): HasOne {
        return $this->hasOne(User::class);
    }

    public function book(): HasOne {
        return $this->hasOne(Book::class);
    }
}
