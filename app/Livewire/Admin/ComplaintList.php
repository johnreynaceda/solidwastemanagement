<?php

namespace App\Livewire\Admin;

use App\Models\Complaint;
use App\Models\Shop\Product;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
 
class ComplaintList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Complaint::query())
            ->columns([
               
                TextColumn::make('ticket_number')->label('TICKET #')->badge()->color('info')->searchable(),
                TextColumn::make('user.name')->label('USER')->searchable(),
                TextColumn::make('purok.name')->label('PUROK')->searchable(),
                TextColumn::make('waste.name')->label('WASTE')->searchable(),
                TextColumn::make('violation.name')->label('VIOLATION')->searchable(),
                TextColumn::make('date_time')->label('DATE & TIME')->date('F d, Y H:i A')->searchable(),
                TextColumn::make('status')->label('STATUS')->badge()->color('success')->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make('view')->label('View Proof')->icon('heroicon-o-eye')->color('warning')->form([
                        ViewField::make('rating')->label('')->view('filament.forms.view-proof')
                    ])->modalWidth('xl')->modalHeading('View Proof'),
                    Action::make('Take an Action')->color('gray')->icon('heroicon-o-clipboard-document-list')->form([
                        Textarea::make('feeback')->placeholder('Enter message here')->required()
                    ])->modalWidth('xl')->action(
                        function($record, $data){
                            $record->update([
                                'status' => 'Taking Action',
                                'feedback' => $data['feeback'],
                            ]);
                        }
                    ),
                    Action::make('Close Ticket')->color('danger')->icon('heroicon-o-x-circle')->action(
                        function($record){
                            $record->update([
                               'status' => 'Closed',
                            ]);
                        }
                    ),
                    Action::make('Resolve Ticket')->color('success')->icon('heroicon-o-check-circle')->action(
                        function($record){
                            $record->update([
                               'status' => 'Resolved',
                            ]);
                        }
                    ),
                ])
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.complaint-list');
    }
}
