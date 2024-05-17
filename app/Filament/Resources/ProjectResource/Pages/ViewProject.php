<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ViewRecord;

class ViewProject extends ViewRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')->label('Project Name')->disabled(),
            DateTimePicker::make('start_date')->label('Start Date')->disabled(),
            DateTimePicker::make('deadline')->label('Deadline')->disabled(),
            TextInput::make('status')->label('Status')->disabled(),
            Textarea::make('description')->label('Description')->disabled(),
            Select::make('assignee_id')
                ->relationship('assignee', 'name')
                ->label('Assignee')
                ->disabled(),
            Select::make('user_id')
                ->relationship('assignor', 'name')
                ->label('Assignor')
                ->visible(auth()->user()->isCustomer())
                ->disabled(),
        ];
    }
}
