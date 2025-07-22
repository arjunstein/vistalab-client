<?php

namespace App\Livewire\Customer;

use App\Services\Customer\CustomerService;
use App\Services\Pms\PmsService;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateCustomer extends Component
{
    #[Title('Add Customer')]

    public $customer_name, $os_server, $ip_server, $pms_id, $server_type, $interface_note;

    protected CustomerService $customerService;
    protected PmsService $pmsService;

    public function boot(CustomerService $customerService, PmsService $pmsService)
    {
        $this->customerService = $customerService;
        $this->pmsService = $pmsService;
    }

    public function render()
    {
        $pmsList = $this->pmsService->allPms(null);

        return view('livewire.customer.create-customer', [
            'title' => 'Add Customer',
            'pmsList' => $pmsList,
        ]);
    }

    public function storeCustomer()
    {
        $this->customerService->createCustomerService([
            'customer_name' => $this->customer_name,
            'os_server' => $this->os_server,
            'ip_server' => $this->ip_server,
            'pms_id' => $this->pms_id,
            'server_type' => $this->server_type,
            'interface_note' => $this->interface_note,
        ]);

        return $this->redirect(route('list-customer'), navigate: true);
    }
}
