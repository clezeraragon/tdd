<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\Models\User;

class IntegrationUserTest extends TestCase
{
    use WithFaker,RefreshDatabase,DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /** @test */

    public function a_can_create_users_a_project()
    {
        $this->withoutExceptionHandling();

        $atributes = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password(20),
        ];

        $this->post("api/v1/user",$atributes);

        $this->assertDatabaseHas('users',$atributes);
    }

//    /** @test */

    public function a_can_create_users_a_project_factory()
    {
        // Teste quebrado
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $result = $this->post("api/v1/user",$user->toArray());
        $result->assertStatus(201);

    }

    /** @test */

    public function a_can_users_project_update()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $result = $this->put("api/v1/user/{$user->id}",$user->toArray());
        $result->assertStatus(202);
    }

    /** @test */

    public function a_can_users_project_delete()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $result = $this->delete("api/v1/user/{$user->id}",$user->toArray());
        $result->assertStatus(202);
    }
}
