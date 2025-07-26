<?php

namespace App\Services\User;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class UserServiceImplement extends ServiceApi implements UserService
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
    protected UserRepository $mainRepository;

    public function __construct(UserRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    // validation user before create & update
    private function _validate_user_data(array $data, $id = null): array
    {
        $uniqueUsername = $id ? "unique:users,username," . $id : "unique:users,username";
        $uniqueEmail = $id ? "unique:users,email," . $id : "unique:users,email";

        $rules = [
            'username' => 'required|regex:/^[a-zA-Z0-9]+$/|max:30|' . $uniqueUsername,
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:100',
            'email' => 'required|email|max:100|' . $uniqueEmail,
        ];

        if (!$id || isset($data['password'])) {
            $rules['password'] = 'nullable|string|min:8|confirmed';
        }

        $messages = [
            'username.required' => 'Username is required',
            'username.regex' => 'Username allowed only alphabet and number without space',
            'username.max' => 'Username must be less than 30 characters',
            'username.unique' => 'Username already exists',
            'name.required' => 'Name is required',
            'name.regex' => 'Name allowed only alphabet and space',
            'name.max' => 'Name must be less than 100 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.max' => 'Email must be less than 100 characters',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not match',
            'password.min' => 'Password must be at least 8 characters',
        ];

        return validator($data, $rules, $messages)->validate();
    }

    public function getAllUserWithPaginate(?int $paginate)
    {
        return $this->mainRepository->getAllUser($paginate);
    }

    public function searchUserService($query, ?int $paginate)
    {
        return $this->mainRepository->searchUser($query, $paginate);
    }

    public function createUserService(array $data)
    {
        $this->_validate_user_data($data);
        // Hash password if provided
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->mainRepository->createUser($data);
    }

    public function updateUserService(string $id, array $data)
    {
        $this->_validate_user_data($data, $id);

        // Hash password if provided
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        return $this->mainRepository->updateUser($id, $data);
    }

    public function deleteUserService(string $id)
    {
        // prevent user delete self
        if ($id == auth()->user()->id) {
            return false;
        }

        return $this->mainRepository->deleteUser($id);
    }
}
