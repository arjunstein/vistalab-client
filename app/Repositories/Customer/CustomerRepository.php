<?php

namespace App\Repositories\Customer;

use LaravelEasyRepository\Repository;

interface CustomerRepository extends Repository
{
    public function getAllCustomerPaginate(?int $perPage);
    public function createCustomer(array $data);
    public function updateCustomer(string $id, array $data);
    public function deleteCustomer(string $id);
}
