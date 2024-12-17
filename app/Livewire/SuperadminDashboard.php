<?php

namespace App\Livewire;

use App\Models\Purok;
use Livewire\Component;

class SuperadminDashboard extends Component
{
    public $allPuroks = [];

    public function mount(){
        $this->allPuroks = Purok::withCount('complaints')->get()->toArray();
      }

    public function render()
    {
        return view('livewire.superadmin-dashboard');
    }
}
