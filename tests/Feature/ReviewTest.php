<?php

namespace Tests\Feature;

use App\Livewire\CommentPost;
use App\Livewire\CommentSection;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test posting a comment with valid data.
     *
     * @return void
     */
    public function testPostCommentWithValidData()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $this->actingAs($user);

        Livewire::test(CommentPost::class)
            ->set('rating', 4)
            ->set('review', 'Test review')
            ->set('user_id', $user->id)
            ->set('book_id', $book->id)
            ->call('postComment')
            ->assertRedirect(route('book-detail', ['id' => $book->id]));
    }

    /**
     * Test if a review can be deleted
     *
     * @return void
     */
    public function testCanDeleteReview()
    {
        $review = Review::factory()->create();
        $book = Book::factory()->create();

        Livewire::test(CommentSection::class, ['reviews' => [$review]])
            ->set('id_book', $book->id)
            ->call('deleteReview', $review->id)
            ->assertRedirect(route('book-detail', ['id' => $book->id]));

        $this->assertDatabaseMissing('reviews', ['id' => $review->id]);
    }
}
