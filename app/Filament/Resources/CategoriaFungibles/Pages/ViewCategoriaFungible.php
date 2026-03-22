<?php

namespace App\Filament\Resources\CategoriaFungibles\Pages;

use App\Filament\Resources\CategoriaFungibles\CategoriaFungibleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCategoriaFungible extends ViewRecord
{
    protected static string $resource = CategoriaFungibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
