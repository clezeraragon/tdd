<?php

namespace Tests\Unit;

use App\Http\Controllers\User\UserController;
use App\Http\Requests\User\UserCreateRequest;
use App\Models\User;

use App\Services\ServiceUser;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
class UserServiceTest extends TestCase
{
    use WithFaker,DatabaseMigrations,RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /** @test  */

    public function test_it_can_create_service_user()
    {
        $this->withoutExceptionHandling();

        $user = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password(20)
        ];

        $request = new Request($user);

        $userService = app(ServiceUser::class);
        $result = $userService->store($request);
        $this->assertEquals(201,$result->status());

    }

    /** @test  */

    public function a_users_required_name()
    {
        $user = factory(User::class)->raw(['name' => '']);

        $this->post("api/v1/user",$user)->assertSessionHasErrors('name');
    }

    /** @test */

    public function a_users_required_email()
    {
        $user = factory(User::class)->raw(['email' => '']);

        $this->post("api/v1/user",[])->assertSessionHasErrors('email');
    }

    /** @test */

    public function a_users_required_password()
    {
        $user = factory(User::class)->raw(['password' => '']);

        $this->post("api/v1/user",[])->assertSessionHasErrors('password');
    }
}
