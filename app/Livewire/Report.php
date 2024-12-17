<?php

namespace App\Livewire;

use App\Models\Barangay;
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

class Report extends Component implements HasForms
{
    use InteractsWithForms;
    public $barangay_id;
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('barangay_id')->label('Barangay')->options(Barangay::get()->pluck('name', 'id'))->reactive()
            ]);
    }

    
    public function render()
    {
        return view('livewire.report',[
            'complaints' => Complaint::when($this->barangay_id, function($record){
                return $record->whereHas('purok', function($record){
                    return $record->where('barangay_id', $this->barangay_id);
                });
            })->get(),
        ]);
    }
}
