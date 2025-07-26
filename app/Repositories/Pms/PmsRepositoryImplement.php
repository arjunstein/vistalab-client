<?php

namespace App\Repositories\Pms;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Pms;

class PmsRepositoryImplement extends Eloquent implements PmsRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected Pms $model;

    public function __construct(Pms $model)
    {
        $this->model = $model;
    }

    public function getAllPmsPaginate(?int $perPage)
    {
        return $this->model->paginate($perPage);
    }

    public function searchPms($query, ?int $paginate)
    {
        return $this->model->where('pms_name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->paginate($paginate);
    }

    public function createPms(array $data)
    {
        return $this->model->create($data);
    }

    public function updatePms(string $id, array $data)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function deletePms(string $id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
