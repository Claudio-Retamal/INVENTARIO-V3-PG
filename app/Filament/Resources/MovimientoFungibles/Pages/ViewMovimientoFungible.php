<?php

namespace App\Filament\Resources\MovimientoFungibles\Pages;

use App\Filament\Resources\MovimientoFungibles\MovimientoFungibleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMovimientoFungible extends ViewRecord
{
    protected static string $resource = MovimientoFungibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
