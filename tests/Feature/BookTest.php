<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Review;
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
     * Test if a book can be created without a title
     */
    public function testCantCreateBookWithProblem(): void
    {
        $response = $this->post('/books', [
            'title' => 'title',
            'description' => 158
        ]);

        $response->assertSessionHas('error', 'An error occured');
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

    public function testUserMustBeLoggedInToAddBook()
    {
        Book::factory()->create(['title' => 'Peter Pan']);
        $response = $this->post('/book/{id}', ['id' => 1]);
        $response->assertSessionHas('error', 'You need to be connected to add a book to your library');
        $response->assertRedirect();
    }
    public function testBookHasManyReviews()
    {
        $book = Book::factory()->create();
        $review = Review::factory()->create(['book_id' => $book->id]);

        $this->assertInstanceOf(Review::class, $book->review->first());
    }

    public function testBookBelongsToManyUsers()
    {
        $book = Book::factory()->create();
        $user = User::factory()->create();

        $book->user()->attach($user);

        $this->assertInstanceOf(User::class, $book->user->first());
    }

    public function testBookIsCreatedWithCorrectAttributes()
    {
        $data = [
            'title' => 'Test Book',
            'description' => 'This is a test book',
            'picture_path' => '/path/to/picture',
            'isbn' => '1234567890'
        ];

        $book = Book::create($data);

        $this->assertEquals($data['title'], $book->title);
        $this->assertEquals($data['description'], $book->description);
        $this->assertEquals($data['picture_path'], $book->picture_path);
        $this->assertEquals($data['isbn'], $book->isbn);
    }
}
