<?php

namespace App\Livewire\Customer;

use App\Services\Customer\CustomerService;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ListCustomer extends Component
{
    use WithPagination;

    #[Title('List Customer')]

    public $perPage = 10;

    protected CustomerService $customerService;

    public function boot(CustomerService $customerService)
    {
        $this->perPage = 10;
        $this->customerService = $customerService;
    }

    public function render()
    {
        $all_customer = $this->customerService->allCustomer($this->perPage);

        return view('livewire.customer.list-customer', [
            'title' => 'List Customer',
            'all_customer' => $all_customer
        ]);
    }

    public function deleteCustomer($id)
    {
        $this->customerService->deleteCustomerService($id);
        $this->dispatch('show-alert', message: 'Customer deleted successfully');
    }
}
