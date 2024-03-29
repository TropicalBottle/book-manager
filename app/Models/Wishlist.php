<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id'
    ];

    public function user(): HasOne {
        return $this->hasOne(User::class);
    }

    public function book(): HasOne {
        return $this->hasOne(Book::class);
    }
}
