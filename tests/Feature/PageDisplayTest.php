<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageDisplayTest extends TestCase
{
    /*
     * Check if the homepage is working when no user is connected
     */
    public function testHomePageIsWorkingWhenUserNotConnected(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /*
     * Check if the homepage is working when no user is connected
     */
    public function testDashBoardPageIsWorkingWhenUserNotConnected(): void
    {
        $response = $this->get('/dashboard');
        $response->assertRedirectToRoute('login');
    }

    /*
     * Check if the page displaying the list of users is working when no user is connected
     */
    public function testBooksListIsWorkingWhenUserNotConnected(): void
    {
        $response = $this->get('/books');
        $response->assertStatus(200);
    }

    /*
     * Check if the page displaying the list of users is working when no user is connected
     */
    public function testUserBooksListIsWorkingWhenUserNotConnected(): void
    {
        $response = $this->get('/my-books');
        $response->assertSessionHas('error', 'You need to be connected to see that page');
        $response->assertRedirect();
    }
}
