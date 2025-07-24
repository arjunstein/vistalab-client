<?php

namespace App\Livewire\Auth;

use App\Services\Auth\AuthService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Title('Login page')]
    #[Layout('components.layouts.auth')]

    public $username, $password;
    public $remember = false;

    protected AuthService $authService;

    public function boot(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        try {
            $this->authService->login($this->username, $this->password, $this->remember);

            $intendedUrl = session()->pull('url.intended', route('dashboard'));

            session()->flash('success', 'Login successfully');
            return $this->redirect($intendedUrl, navigate: true);
        } catch (\Throwable $e) {
            session()->flash('error', 'Login failed');
            $this->addError('username', $e->getMessage());
        }
    }
}
