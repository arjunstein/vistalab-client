<?php

namespace App\Services\Pms;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Pms\PmsRepository;

class PmsServiceImplement extends ServiceApi implements PmsService
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
    protected PmsRepository $mainRepository;

    public function __construct(PmsRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    private function _validate_data_pms(array $data)
    {
        $rules = [
            'pms_name' => 'required|regex:/^[a-zA-Z0-9 .,\\-]+$/|max:30',
            'description' => 'nullable|string|max:300',
        ];

        $messages = [
            'pms_name.required' => 'Pms name is required',
            'pms_name.regex' => 'Pms name allowed contains (alphabet, number, space, dot, comma, dash)',
            'pms_name.max' => 'Pms name must be less than 30 characters',
            'description.max' => 'Description must be less than 300 characters',
        ];

        return validator($data, $rules, $messages)->validate();
    }

    public function allPms(?int $perPage)
    {
        return $this->mainRepository->getAllPmsPaginate($perPage);
    }

    public function createPmsService(array $data)
    {
        $this->_validate_data_pms($data);

        return $this->mainRepository->createPms($data);
    }

    public function updatePmsService(string $id, array $data)
    {
        $this->_validate_data_pms($data);

        return $this->mainRepository->updatePms($id, $data);
    }

    public function deletePmsService(string $id)
    {
        return $this->mainRepository->deletePms($id);
    }
}
