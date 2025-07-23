<?php

namespace App\Livewire\User;

use App\Services\User\UserService;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateUser extends Component
{
    #[Title('Create User')]

    public $username;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected UserService $userService;

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function render()
    {
        return view('livewire.user.create-user', [
            'title' => 'Create User'
        ]);
    }

    public function saveUser()
    {
        $this->userService->createUserService([
            'username' => $this->username,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ]);

        session()->flash('success', 'User added successfully');
        return $this->redirect(route('list-user'), navigate: true);
    }
}
