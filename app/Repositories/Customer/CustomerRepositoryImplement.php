<?php

namespace App\Repositories\Customer;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Customer;

class CustomerRepositoryImplement extends Eloquent implements CustomerRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected Customer $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    public function getAllCustomerPaginate(?int $perPage)
    {
        return $this->model->with('pms')->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function searchCustomer($query, ?int $paginate)
    {
        return $this->model->with('pms')->where('customer_name', 'like', '%' . $query . '%')
            ->orWhere('os_server', 'like', '%' . $query . '%')
            ->orWhere('ip_server', 'like', '%' . $query . '%')
            ->orWhere('megalos', 'like', '%' . $query . '%')
            ->orWhere('server_type', 'like', '%' . $query . '%')
            ->orWhereHas('pms', function ($q) use ($query) {
                $q->where('pms_name', 'like', '%' . $query . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($paginate);
    }

    public function createCustomer(array $data)
    {
        return $this->model->create($data);
    }

    public function updateCustomer(string $id, array $data)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function deleteCustomer(string $id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
