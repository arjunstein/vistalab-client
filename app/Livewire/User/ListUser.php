<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Services\User\UserService;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ListUser extends Component
{
    use WithPagination;

    #[Title('List users')]
    public User $user;
    public $paginate = 10;

    protected UserService $userService;

    public function boot(UserService $userService)
    {
        $this->paginate = 10;
        $this->userService = $userService;
    }

    public function render()
    {
        return view('livewire.user.list-user', [
            'title' => 'List users',
            'all_users' => $this->userService->getAllUserWithPaginate($this->paginate)
        ]);
    }

    public function deleteUser($id)
    {
        try {
            $deleted = $this->userService->deleteUserService($id);

            if ($deleted) {
                $this->dispatch('show-alert', message: 'User deleted successfully!', type: 'success');
            } else {
                $this->dispatch('show-alert', message: 'You cannot delete your own account.', type: 'danger');
            }
        } catch (\Throwable $th) {
            $this->dispatch('show-alert', message: 'User deletion failed!', type: 'danger');
        }
    }
}
