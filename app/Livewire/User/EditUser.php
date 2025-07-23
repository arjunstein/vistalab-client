<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Services\User\UserService;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditUser extends Component
{
    #[Title('Edit User')]

    public User $user;

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

    public function mount(User $user)
    {
        $this->user = $user;
        $this->username = $user->username;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.user.edit-user', [
            'title' => 'Edit User'
        ]);
    }

    public function updateUser()
    {
        $this->userService->updateUserService($this->user->id, [
            'username' => $this->username,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ]);

        session()->flash('success', 'User updated successfully');
        return $this->redirect(route('list-user'), navigate: true);
    }
}
