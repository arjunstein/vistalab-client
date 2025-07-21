<?php

namespace App\Livewire\Auth;

use App\Services\Auth\AuthService;
use Livewire\Component;

class Logout extends Component
{
    protected AuthService $authService;

    public function boot(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function logout()
    {
        $this->authService->logout();
        return $this->redirect(route('login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
