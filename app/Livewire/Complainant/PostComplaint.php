<?php

namespace App\Livewire\Complainant;

use App\Models\Barangay;
use App\Models\Complaint;
use App\Models\Post;
use App\Models\Purok;
use App\Models\Violation;
use App\Models\Waste;
use Carbon\Carbon;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class PostComplaint extends Component implements HasForms
{
    use InteractsWithForms;
    public $barangay;
    public $purok, $waste, $violation, $datetime;

    public $selectedPurok = null;
    public $allPuroks = [];
    public $proof = [];

  public function mount(){
    $this->allPuroks = Purok::withCount('complaints')->get()->toArray();
  }

  public function updatedPurok(){
    $this->selectedPurok = $this->purok;

    $this->dispatch('purokSelected', $this->purok);
  }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('barangay')->options(
                    Barangay::all()->pluck('name', 'id')
                )->reactive()->required()
                ->afterStateUpdated(fn ($state, callable $set) => $set('purok', null)),
                Select::make('purok')
                ->options(function ($get) {
                    $barangay = $get('barangay');
                    return $barangay ? Purok::where('barangay_id', $barangay)->pluck('name', 'id') : [];
                })
                ->reactive()->required(),
                Grid::make(2)->schema([
                    Select::make('waste')->options(Waste::all()->pluck('name', 'id'))->required(),
                    Select::make('violation')->options(Violation::all()->pluck('name', 'id'))->required(),
                    DateTimePicker::make('datetime')->label('Date & Time')->columnSpan(2)->required(),
                    FileUpload::make('proof')->label('Upload Proof')->columnSpan(2)->required(),
            ])
                ]);
    }

 
  
    

    public function submitComplaint(){
        foreach ($this->proof as $key => $value) {
            Complaint::create([
                'user_id' => auth()->user()->id,
                'ticket_number' => $this->generateRandomString(),
                'purok_id' => $this->purok,
                'waste_id' => $this->waste,
                'violation_id' => $this->violation,
                'date_time' => Carbon::parse($this->datetime),
                'file_path' => $value->store('Proof', 'public'),
            ]);
        }

        return redirect()->route('complainant.records');
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function render()
    {
       

        return view('livewire.complainant.post-complaint');
    }
}
