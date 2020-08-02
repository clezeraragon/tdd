<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Services\ServiceUser;

class UserController extends Controller
{
    private ServiceUser $serviceUser;

    public function __construct(ServiceUser $serviceUser)
    {
        $this->serviceUser = $serviceUser;
    }

    public function store(UserCreateRequest $userCreateRequest)
    {
        return $this->serviceUser->store($userCreateRequest);
    }

    public function update(UserUpdateRequest $userUpdateRequest,$user)
    {
        return $this->serviceUser->update($userUpdateRequest,$user);
    }

    public function destroy($user)
    {
        return $this->serviceUser->destroy($user);
    }

}
