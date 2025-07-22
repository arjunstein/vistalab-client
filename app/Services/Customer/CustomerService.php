<?php

namespace App\Services\Customer;

use LaravelEasyRepository\BaseService;

interface CustomerService extends BaseService
{
    public function allCustomer(?int $perPage);
    public function createCustomerService(array $data);
    public function updateCustomerService(string $id, array $data);
    public function deleteCustomerService(string $id);
}
