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
    public $search = '';
    public $paginate = 10;

    protected UserService $userService;

    public function boot(UserService $userService)
    {
        $this->paginate = 10;
        $this->userService = $userService;
    }

    public function render()
    {
        if ($this->search) {
            $search_users = $this->userService->searchUserService($this->search, $this->paginate);
        } else {
            $search_users = $this->userService->getAllUserWithPaginate($this->paginate);
        }

        return view('livewire.user.list-user', [
            'title' => 'List users',
            'all_users' => $search_users,

        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPaginate()
    {
        $this->resetPage();
    }

    public function deleteUser($id)
    {
        $deleted = $this->userService->deleteUserService($id);

        if ($deleted) {
            $this->dispatch('show-alert', message: 'User deleted successfully!', type: 'success');
        } else {
            $this->dispatch('show-alert', message: 'You cannot delete your own account.', type: 'danger');
        }
    }
}
