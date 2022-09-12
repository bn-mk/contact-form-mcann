<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_screen_can_be_rendered()
    {
        $response = $this->get('/contact-us');

        $response->assertStatus(200);
    }

    public function test_users_can_submit_form()
    {
        $response = $this->post('/contact-us', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'comment' => 'This is a test comment'
        ]);

        $response->assertRedirect('contact-success');
    }
}
