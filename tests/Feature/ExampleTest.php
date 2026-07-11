<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertRedirect('login');
    }

    public function test_guest_cannot_open_admin_pages()
    {
        $this->get('/add-domain-url')->assertRedirect('/login');
    }

    public function test_guest_cannot_submit_admin_updates()
    {
        $this->post('/add-domain-urls', [
            'url' => 'https://example.com',
        ])->assertRedirect('/login');
    }

    public function test_guest_cannot_self_register()
    {
        $this->get('/registration')->assertRedirect('/login');
    }
}
