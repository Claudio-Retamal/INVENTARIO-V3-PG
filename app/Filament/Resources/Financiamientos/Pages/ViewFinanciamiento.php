<?php

namespace App\Filament\Resources\Financiamientos\Pages;

use App\Filament\Resources\Financiamientos\FinanciamientoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFinanciamiento extends ViewRecord
{
    protected static string $resource = FinanciamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
