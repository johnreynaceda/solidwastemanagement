<?php

namespace App\Livewire\Admin;

use App\Models\Complaint;
use App\Models\Post;
use App\Models\Purok;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AdminReport extends Component implements HasForms
{
    use InteractsWithForms;

    public $purok_id;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('purok_id')->label('Purok')->options(Purok::where('barangay_id', auth()->user()->barangay->id)->get()->pluck('name', 'id'))->reactive()
            ]);
    }

    public function render()
    {
        return view('livewire.admin.admin-report',[
            'complaints' => Complaint::when($this->purok_id, function($purok){
                return $purok->where('purok_id', $this->purok_id);
            })->whereHas('purok', function($record){
                return $record->where('barangay_id', auth()->user()->barangay->id);
            })->get(),
        ]);
    }
}
