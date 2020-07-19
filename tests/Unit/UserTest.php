<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use WithFaker,RefreshDatabase,DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_can_create_users()
    {
        $user = factory(User::class)->create();
        $this->assertEquals(1, $user->count());
    }
}
