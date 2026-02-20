<?php

namespace App\Filament\Resources\HistorialPrestacions\Pages;

use App\Filament\Resources\HistorialPrestacions\HistorialPrestacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHistorialPrestacions extends ListRecords
{
    protected static string $resource = HistorialPrestacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
