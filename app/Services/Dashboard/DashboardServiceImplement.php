<?php

namespace App\Services\Dashboard;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Dashboard\DashboardRepository;

class DashboardServiceImplement extends ServiceApi implements DashboardService
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
    protected DashboardRepository $mainRepository;

    public function __construct(DashboardRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function countAllUsersService()
    {
        return $this->mainRepository->getAllUsers();
    }

    public function countAllPmsService()
    {
        return $this->mainRepository->getAllPms();
    }

    public function countAllCustomersService()
    {
        return $this->mainRepository->getAllCustomers();
    }
}
