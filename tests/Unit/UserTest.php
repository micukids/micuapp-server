<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class UserTest extends TestCase
{
    public function test_login_form(): void
    {
        $response = $this->get('/');
        $response = assertStatus(200);
    }
}
