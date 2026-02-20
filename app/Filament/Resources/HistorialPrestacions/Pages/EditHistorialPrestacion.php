<?php

namespace App\Filament\Resources\HistorialPrestacions\Pages;

use App\Filament\Resources\HistorialPrestacions\HistorialPrestacionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHistorialPrestacion extends EditRecord
{
    protected static string $resource = HistorialPrestacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
