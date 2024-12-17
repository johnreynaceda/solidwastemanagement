<?php

namespace App\Livewire;

use App\Models\Purok;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $allPuroks = [];

    public function mount(){
        $this->allPuroks = Purok::where('barangay_id', auth()->user()->barangay->id)->withCount('complaints')->get()->toArray();
      }

    public function render()
    {
       
        return view('livewire.admin-dashboard',[
            'puroks' => Purok::where('barangay_id', auth()->user()->barangay->id)->withCount('complaints')->get(),
        ]);
    }
}
