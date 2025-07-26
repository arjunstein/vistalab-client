<?php

namespace App\Livewire\Pms;

use App\Models\Pms;
use App\Services\Pms\PmsService;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ListPms extends Component
{
    use WithPagination;

    #[Title('List Interface')]
    public Pms $pms;
    public $search = '';
    public $perPage = 10;

    protected PmsService $pmsService;

    public function boot(PmsService $pmsService)
    {
        $this->perPage = 10;
        $this->pmsService = $pmsService;
    }

    public function render()
    {
        if ($this->search) {
            $all_pms = $this->pmsService->searchPmsService($this->search, $this->perPage);
        } else {
            $all_pms = $this->pmsService->allPms($this->perPage);
        }

        return view('livewire.pms.list-pms', [
            'title' => 'List Interface',
            'all_pms' => $all_pms
        ]);
    }

    public function updatingSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function deletePms($id)
    {
        $deleted = $this->pmsService->deletePmsService($id);

        if ($deleted) {
            $this->dispatch('show-alert', message: 'Interface deleted successfully!', type: 'success');
        } else {
            $this->dispatch('show-alert', message: "Can't delete interface, because still has related data", type: 'danger');
        }
    }
}
