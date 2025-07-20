<?php

namespace App\Livewire\Pms;

use App\Models\Pms;
use App\Services\Pms\PmsService;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditPms extends Component
{
    #[Title('Update Interface')]

    public Pms $pms;
    public $pms_name;
    public $description;
    protected PmsService $pmsService;

    public function boot(PmsService $pmsService)
    {
        $this->pmsService = $pmsService;
    }

    public function mount(Pms $pms)
    {
        $this->pms = $pms;
        $this->pms_name = $pms->pms_name;
        $this->description = $pms->description;
    }

    public function render()
    {
        return view('livewire.pms.edit-pms', [
            'title' => 'Update Interface',
        ]);
    }

    public function updatePms()
    {
        $this->pmsService->updatePmsService($this->pms->id, [
            'pms_name' => $this->pms_name,
            'description' => $this->description
        ]);

        return $this->redirect(route('list-pms'), navigate: true);
    }
}
