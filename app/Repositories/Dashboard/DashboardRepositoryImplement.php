<?php

namespace App\Repositories\Dashboard;

use App\Models\Pms;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;
use App\Models\Customer;

class DashboardRepositoryImplement extends Eloquent implements DashboardRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected User $user;
    protected Pms $pms;
    protected Customer $customer;

    public function __construct(User $user, Pms $pms, Customer $customer)
    {
        $this->user = $user;
        $this->pms = $pms;
        $this->customer = $customer;
    }

    public function getAllUsers()
    {
        return $this->user->count();
    }

    public function getAllPms()
    {
        return $this->pms->count();
    }

    public function getAllCustomers()
    {
        return $this->customer->count();
    }
}
