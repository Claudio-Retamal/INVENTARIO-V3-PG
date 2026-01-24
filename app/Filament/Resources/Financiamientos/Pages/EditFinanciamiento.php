<?php

namespace App\Filament\Resources\Financiamientos\Pages;

use App\Filament\Resources\Financiamientos\FinanciamientoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFinanciamiento extends EditRecord
{
    protected static string $resource = FinanciamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
