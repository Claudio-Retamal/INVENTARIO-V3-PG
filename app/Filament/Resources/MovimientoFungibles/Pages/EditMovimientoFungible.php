<?php

namespace App\Filament\Resources\MovimientoFungibles\Pages;

use App\Filament\Resources\MovimientoFungibles\MovimientoFungibleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditMovimientoFungible extends EditRecord
{
    protected static string $resource = MovimientoFungibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
