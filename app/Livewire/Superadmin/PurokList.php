<?php

namespace App\Livewire\Superadmin;

use App\Models\Barangay;
use App\Models\Purok;
use App\Models\Shop\Product;
use Filament\Forms\Components\Select;
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

class PurokList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Purok::query())->headerActions([
                CreateAction::make('new')->color('success')->icon('heroicon-o-plus')->form([
                    TextInput::make('name')->required(),
                    Select::make('barangay_id')->label('Barangay')->options(
                        Barangay::all()->pluck('name', 'id')
                    ),
                    TextInput::make('latitude'),
                    TextInput::make('longitude'),
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable()->formatStateUsing(
                    fn($record) => strtoupper($record->name)
                ),
                TextColumn::make('barangay.name')->label('BARANGAY')->searchable()->formatStateUsing(
                fn($record) => strtoupper($record->barangay->name)
                ),
                TextColumn::make('latitude')->label('LATITUDE'),
                TextColumn::make('longitude')->label('LONGITUDE'),
                // ...
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('name')->required(),
                    Select::make('barangay_id')->label('Barangay')->options(
                        Barangay::all()->pluck('name', 'id')
                    ),
                    TextInput::make('latitude'),
                    TextInput::make('longitude'),
                ])->modalWidth('xl')
            ])
            ->bulkActions([
                // ...
            ]);
    }


    public function render()
    {
        return view('livewire.superadmin.purok-list');
    }
}
