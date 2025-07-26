<?php

namespace App\Services\User;

use LaravelEasyRepository\BaseService;

interface UserService extends BaseService
{
    public function getAllUserWithPaginate(?int $paginate);
    public function createUserService(array $data);
    public function updateUserService(string $id, array $data);
    public function deleteUserService(string $id);
    public function searchUserService($query, ?int $paginate);
}
