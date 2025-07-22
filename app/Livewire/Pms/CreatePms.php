<?php

namespace App\Livewire\Pms;

use App\Services\Pms\PmsService;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreatePms extends Component
{
    #[Title('Add Interface')]
    public $pms_name;
    public $description;

    protected PmsService $pmsService;

    public function boot(PmsService $pmsService)
    {
        $this->pmsService = $pmsService;
    }

    public function render()
    {
        return view('livewire.pms.create-pms', [
            'title' => 'Add Interface'
        ]);
    }

    public function storePms()
    {
        $this->pmsService->createPmsService([
            'pms_name' => $this->pms_name,
            'description' => $this->description
        ]);

        session()->flash('success', 'Interface added successfully');
        return $this->redirect(route('list-pms'), navigate: true);
    }
}
