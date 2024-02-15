<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
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

}
