<?php

namespace App\Filament\Resources\MovimientoFungibles\Pages;

use App\Filament\Resources\MovimientoFungibles\MovimientoFungibleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMovimientoFungibles extends ListRecords
{
    protected static string $resource = MovimientoFungibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
