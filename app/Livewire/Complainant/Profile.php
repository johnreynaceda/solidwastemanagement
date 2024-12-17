<?php

namespace App\Livewire\Complainant;

use App\Models\Post;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Profile extends Component implements HasForms
{
    use InteractsWithForms;
    public $firstname, $lastname, $middlename, $age, $sex, $phone_number, $address;

    public function mount(){
        $data = auth()->user()->complainantInfo;
        $this->firstname = $data->firstname;
        $this->lastname = $data->lastname;
        $this->middlename = $data->middlename;
        $this->age = $data->age;
        $this->sex = $data->sex;
        $this->phone_number = $data->phone_number;
        $this->address = $data->address;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
              Grid::make(3)->schema([
                TextInput::make('firstname'),
                TextInput::make('middlename'),
                TextInput::make('lastname'),
                TextInput::make('age'),
                TextInput::make('sex'),
                TextInput::make('phone_number'),
                TextInput::make('address')->columnSpan(2),
              ])
            ]);
    }

    public function updateProfile(){
        auth()->user()->complainantInfo->update([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'middlename' => $this->middlename,
            'age' => $this->age,
           'sex' => $this->sex,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
        ]);
        auth()->user()->update([
            'name' => $this->firstname.' '.$this->lastname,
        ]);

        return redirect()->route('complainant.dashboard');
    }

    public function render()
    {
        return view('livewire.complainant.profile');
    }
}
