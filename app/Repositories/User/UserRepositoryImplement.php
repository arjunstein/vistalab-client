<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;

class UserRepositoryImplement extends Eloquent implements UserRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAllUser(?int $paginate)
    {
        return $this->model->paginate($paginate);
    }

    public function createUser(array $data)
    {
        return $this->model->create($data);
    }

    public function updateUser(string $id, array $data)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function deleteUser(string $id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
