<?php

namespace App\Filament\Resources\Prestacions\Pages;

use App\Filament\Resources\Prestacions\PrestacionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPrestacion extends ViewRecord
{
    protected static string $resource = PrestacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
