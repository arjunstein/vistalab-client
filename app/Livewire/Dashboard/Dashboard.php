<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Services\Dashboard\DashboardService;

class Dashboard extends Component
{
    #[Title('Dashboard')]

    protected DashboardService $dashboardService;

    public function boot(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard', [
            'title' => 'Dashboard',
            'all_users' => $this->dashboardService->countAllUsersService() ?? [],
            'all_pms' => $this->dashboardService->countAllPmsService() ?? [],
            'all_customers' => $this->dashboardService->countAllCustomersService() ?? [],
        ]);
    }
}
