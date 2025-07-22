<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use App\Services\Customer\CustomerService;
use App\Services\Pms\PmsService;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditCustomer extends Component
{
    #[Title('Edit customer')]

    public $customer_name, $os_server, $ip_server, $pms_id, $server_type, $interface_note;

    public Customer $customer;
    protected CustomerService $customerService;
    protected PmsService $pmsService;

    public function boot(CustomerService $customerService, PmsService $pmsService)
    {
        $this->customerService = $customerService;
        $this->pmsService = $pmsService;
    }

    public function mount(Customer $customer)
    {
        $this->customer = $customer;

        $this->customer_name = $customer->customer_name;
        $this->os_server = $customer->os_server;
        $this->ip_server = $customer->ip_server;
        $this->pms_id = $customer->pms_id;
        $this->server_type = $customer->server_type;
        $this->interface_note = $customer->interface_note;
    }

    public function render()
    {
        return view('livewire.customer.edit-customer', [
            'title' => 'Edit customer',
            'pmsList' => $this->pmsService->allPms(null),
        ]);
    }

    public function updateCustomer()
    {
        $this->customerService->updateCustomerService(
            $this->customer->id,
            [
                'customer_name' => $this->customer_name,
                'os_server' => $this->os_server,
                'ip_server' => $this->ip_server,
                'pms_id' => $this->pms_id,
                'server_type' => $this->server_type,
                'interface_note' => $this->interface_note,
            ]
        );

        return $this->redirect(route('list-customer'), navigate: true);
    }
}
