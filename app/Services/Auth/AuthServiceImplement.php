<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthRepository;
use App\Services\Auth\AuthService;
use Illuminate\Validation\ValidationException;
use LaravelEasyRepository\ServiceApi;

class AuthServiceImplement extends ServiceApi implements AuthService
{

    /**
     * set title message api for CRUD
     * @param string $title
     */
    protected string $title = "";
    /**
     * uncomment this to override the default message
     * protected string $create_message = "";
     * protected string $update_message = "";
     * protected string $delete_message = "";
     */

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected AuthRepository $mainRepository;

    public function __construct(AuthRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function login($username, $password, $remember = false)
    {
        $user = $this->mainRepository->getUserByUsername($username);

        if ($user && auth()->attempt(['username' => $username, 'password' => $password], $remember)) {
            session()->regenerate();
            return $user;
        }
        // show error messages
        throw ValidationException::withMessages([
            'username' => "The credentials do not match our records.",
        ]);
    }

    public function logout()
    {
        auth()->logout();
        session()->invalidate();
    }
}
