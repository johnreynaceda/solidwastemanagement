<?php

namespace App\Livewire\Superadmin;

use App\Models\Barangay;
use App\Models\Shop\Product;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BarangayList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Barangay::query()->withCount('puroks'))->headerActions([
                CreateAction::make('new')->color('success')->icon('heroicon-o-plus')->form([
                    TextInput::make('name')->required()
                ])->modalWidth('xl')->action(
                    function($data){
                       
                      
                      $user =   User::create([
                            'name' => $data['name'],
                            'email' => strtolower(str_replace(' ', '', $data['name']). '@gmail.com'),
                            'password' => bcrypt('password'),
                            'user_type' => 'admin',
                        ]);
                        $barangay = Barangay::create([
                            'name' => $data['name'],
                            'user_id' =>$user->id
                        ]);
                    }
                )
            ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable()->formatStateUsing(
                    fn($record) => strtoupper($record->name)
                ),
                TextColumn::make('puroks_count')->label('NO. OF PUROKS')->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('name')->required()
                ])->modalWidth('xl')
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.superadmin.barangay-list');
    }
}
