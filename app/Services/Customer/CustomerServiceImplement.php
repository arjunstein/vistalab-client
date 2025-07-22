<?php

namespace App\Services\Customer;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Customer\CustomerRepository;

class CustomerServiceImplement extends ServiceApi implements CustomerService
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
    protected CustomerRepository $mainRepository;

    public function __construct(CustomerRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    // validate data customer before create or update
    private function _validate_data(array $data, $id = null): array
    {
        $uniqueCustomerName = $id ? "unique:customers,customer_name," . $id : "unique:customers,customer_name";

        $rules = [
            'customer_name' => 'required|regex:/^[a-zA-Z0-9 .,\\-]+$/|max:30|' . $uniqueCustomerName,
            'os_server' => 'required|string|max:30',
            'ip_server' => 'required|string|max:30',
            'server_type' => 'required|in:cloud,on-premise',
            'pms_id' => 'required|exists:pms,id',
            'interface_note' => 'nullable|string|max:300',
        ];

        $messages = [
            'customer_name.required' => 'Customer name is required',
            'customer_name.regex' => 'Customer name allowed contains (alphabet, number, space, dot, comma, dash)',
            'customer_name.max' => 'Customer name must be less than 30 characters',
            'customer_name.unique' => 'Customer name already exist',
            'os_server.required' => 'OS server is required',
            'os_server.max' => 'OS server must be less than 30 characters',
            'ip_server.required' => 'IP server is required',
            'ip_server.max' => 'IP server must be less than 30 characters',
            'server_type.required' => 'Server type is required',
            'server_type.in' => 'Server type must be cloud or on-premise',
            'pms_id.required' => 'PMS is required',
            'interface_note.max' => 'Interface note must be less than 300 characters',
        ];

        return validator($data, $rules, $messages)->validate();
    }

    public function allCustomer(?int $perPage)
    {
        return $this->mainRepository->getAllCustomerPaginate($perPage);
    }

    public function createCustomerService(array $data)
    {
        $this->_validate_data($data);

        return $this->mainRepository->createCustomer($data);
    }

    public function updateCustomerService(string $id, array $data)
    {
        $this->_validate_data($data, $id);

        return $this->mainRepository->updateCustomer($id, $data);
    }

    public function deleteCustomerService(string $id)
    {
        return $this->mainRepository->deleteCustomer($id);
    }
}
