<?php

namespace App\Filament\Resources\Financiamientos\Pages;

use App\Filament\Resources\Financiamientos\FinanciamientoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFinanciamientos extends ListRecords
{
    protected static string $resource = FinanciamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
