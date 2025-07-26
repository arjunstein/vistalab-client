<?php

namespace App\Services\Pms;

use LaravelEasyRepository\BaseService;

interface PmsService extends BaseService
{
    public function allPms(?int $perPage);
    public function searchPmsService($query, ?int $paginate);
    public function createPmsService(array $data);
    public function updatePmsService(string $id, array $data);
    public function deletePmsService(string $id);
}
