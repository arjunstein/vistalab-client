<?php

namespace App\Repositories\Dashboard;

use LaravelEasyRepository\Repository;

interface DashboardRepository extends Repository
{
    public function getAllUsers();
    public function getAllPms();
    public function getAllCustomers();
}
