<?php

namespace App\Repositories\Pms;

use LaravelEasyRepository\Repository;

interface PmsRepository extends Repository
{
    public function getAllPmsPaginate(?int $perPage);
    public function searchPms($query, ?int $paginate);
    public function createPms(array $data);
    public function updatePms(string $id, array $data);
    public function deletePms(string $id);
}
