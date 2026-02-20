<?php

namespace App\Filament\Resources\HistorialPrestacions\Pages;

use App\Filament\Resources\HistorialPrestacions\HistorialPrestacionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHistorialPrestacion extends ViewRecord
{
    protected static string $resource = HistorialPrestacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
