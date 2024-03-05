<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class BookTest extends TestCase
{

    use RefreshDatabase;
    /*
     * Test if a book can be created without a title
     */
    public function testCantCreateBookWithoutTitle(): void
    {
        $response = $this->post('/books', [
            'title' => '',
            'description' => 'Description of a book'
        ]);

        $response->assertSessionHas('error', 'You need to add a title');
        $response->assertSessionDoesntHaveErrors(['description']);
        $response->assertRedirect();
    }

    /*
     * Test if a book can be created without a title
     */
    public function testCantCreateBookWithoutInformation(): void
    {
        $response = $this->post('/books', [
            'title' => '',
            'description' => ''
        ]);

        $response->assertSessionHas('error', 'You need to add a title');
        $response->assertRedirect();
    }

    /*
     * Test if a book can be created
     */
    public function testCanCreateBook(): void
    {
        $response = $this->post('/books', [
            'title' => 'Title of book',
            'description' => 'Description of a book'
        ]);

        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect();
    }

    /*
     * Test if a book can be created
     */
    public function testCanCreateBookWithoutDescription(): void
    {
        $response = $this->post('/books', [
            'title' => 'Title of book',
            'description' => ''
        ]);

        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect();
    }

    /*
     * Test if a book can be added to the library of a user
     */
    public function testCanAddBookToLibrary(): void {
        $user = User::factory()->create();
        $book = Book::factory()->create(['title' => 'Peter Pan']);
        $user->book()->attach($book);
        $this->assertTrue($user->book->contains('title', 'Peter Pan'));
    }

    /*
     * Test if a book can be removed from the library of a user
     */
    public function testCanRemoveBookFromLibrary(): void {
        $user = User::factory()->create();
        $book = Book::factory()->create(['title' => 'Peter Pan']);
        $user->book()->detach($book);
        $this->assertFalse($user->book->contains('title', 'Peter Pan'));
    }
}
