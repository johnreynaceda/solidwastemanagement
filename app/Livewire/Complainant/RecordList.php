<?php

namespace App\Livewire\Complainant;

use App\Models\Complaint;
use Livewire\Component;

class RecordList extends Component
{
    public function render()
    {
        return view('livewire.complainant.record-list',[
            'complaints' => Complaint::where('user_id', auth()->user()->id)->orderByDesc('created_at')->get(),
        ]);
    }
}
