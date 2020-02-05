<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreateUser() {

        \Artisan::call('passport:install');
        $response = $response = $this->json('POST',
            '/api/v1/register',
                [
                    'name' => 'Test',
                    'email' => 'test@test.com',
                    'password' => 'password',
                    'c_password' => 'password'
                ]
        );
        $response
            ->assertStatus(200);

        $this->assertDatabaseHas('users', [
                'email' => 'test@test.com',
                'name' => 'Test'
        ]);

    }
}
